<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Holiday;
use DB;
use Hash;
use Illuminate\Support\Arr;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:Voir-liste-utilisateur|Ajouter-utilisateur|Modifier-utilisateur|Supprimer-utilisateur', ['only' => ['index','store']]);
          $this->middleware('permission:Ajouter-utilisateur', ['only' => ['create','store']]);
          $this->middleware('permission:Modifier-utilisateur', ['only' => ['edit','update']]);
          $this->middleware('permission:Supprimer-utilisateur', ['only' => ['destroy']]);
     }



     public function index(Request $request)
     {
         // Mettre à jour les soldes des utilisateurs
         $this->updateSoldeMensuel();

         // Récupérer les utilisateurs depuis la base de données
         $data = User::where([
                 ['name', '!=', NULL],
                 [function ($query) use ($request) {
                     if (($term = $request->term)) {
                         $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                     }
                 }]
             ])
             ->orderBy('id', 'DESC')
             ->paginate(5);

         return view('users.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'prenom' => 'required',
            'phone' => 'required',
            'date_naiss' => 'required',
            'num_emp' => 'required',
            'address' => 'required',
            'ville' => 'required',
            'codepostal' => 'required',
            'solde' => 'required',

            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'avatar' =>'required'


        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));



// Vérifier si l'utilisateur a téléchargé une image
if ($request->hasFile('avatar')) {
    // Obtenir le fichier image téléchargé
    $avatar = $request->file('avatar');

    // Générer un nom de fichier unique
    $filename = time() . '_' . uniqid() . '.' . $avatar->getClientOriginalExtension();

    // Stocker l'image dans le dossier de destination
    $avatar->storeAs('storage/app/public/assets/media/avatars', $filename);

    // Ajouter le nom du fichier à l'entrée utilisateur
    $input['avatar'] = $filename;
   }


        return redirect()->route('users.index')
                        ->with('success','Utilisateur créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'prenom' => 'required',
            'roles' => 'required',
            'annual_balance' => 'nullable|numeric',
            'monthly_balance' => 'nullable|numeric',
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        $user->annual_balance = $validatedData['annual_balance'] ?? 12;
        $user->monthly_balance = $validatedData['monthly_balance'] ?? 1.5;
        return redirect()->route('users.index')
                        ->with('success','Utilisateur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
{
    $user = User::find($id);
    session()->flash('warning', 'Vous êtes sur le point de supprimer l\'utilisateur ' . $user->name);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
}
public function search(Request $request)
{
    $search = $request->input('search');
    $data = User::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->paginate(1);
    return view('users.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 1);
}



public function updateSoldeMensuel()
{
    $users = User::all();
    foreach ($users as $user) {
        $solde = $user->solde;

        // Vérifier si l'utilisateur a demandé un congé pendant le mois en cours
        $conges = $user->conges()->whereMonth('date_debut', Carbon::now()->month)->get();

        if ($conges->count() == 0) {
            // Si l'utilisateur n'a pas demandé de congé ce mois-ci, ajouter 1.5 jours au solde actuel
          //  $solde += 1.5;
        } else {
            // Pour chaque congé demandé ce mois-ci, mettre à jour le solde en conséquence
            foreach ($conges as $conge) {
                if ($conge->type_conge == 'conge_malade' || $conge->type_conge == 'conge_solde') {
                    if ($conge->duree <= $solde) {
                        $solde = $solde - $conge->duree;
                    } else {
                        continue;
                    }
                }
            }
        }

        // Mettre à jour la colonne "solde" pour l'utilisateur actuel
        $user->solde = $solde;
        $user->save();
    }
}


/*
public function calculateAndSaveMonthlySolde($user_id, $month)
{
    $initial_solde = 2.5;
    $monthly_increase = 1.5;
    $total_solde = $initial_solde;

    for ($i = 1; $i < $month; $i++) {
        $total_solde += $monthly_increase;
    }

    $user = User::find($user_id);
    $user->solde = $total_solde;
    $user->save();
}
*/




/*
public function showMonthlySolde()
{
    $users = User::all();
    $month = date('n');
    $initial_solde = 1;
    $monthly_solde = 1.5;
    $current_month = date('n');

    foreach ($users as $user) {
        $cumulative_solde = $month == 1 ? $initial_solde + $monthly_solde : $initial_solde;

        for ($i = 30; $i <= 365; $i += 30) {
            $cumulative_solde += $monthly_solde;

            if (date('n', $i) != $month || $month > $current_month) {
                continue; // On passe au mois suivant si celui-ci est ultérieur à celui en cours
            }

            if ($cumulative_solde >= 30) {
                $cumulative_solde += 1.5;
                $next_month = date("F", strtotime("+1 month", $i));
                if (date('n', strtotime($next_month)) <= $current_month) {
                    $solde_message = "Solde pour " . $next_month . ": " . $cumulative_solde . " jours";
                    $user->solde = $solde_message;
                    $user->save();
                }
                $month++;
            }
        }
    }
}




public function getSoldeAttribute($value)
{
    return $this->attributes['solde'] ?? '';
}

*/


}



/*
    public function calculateCumulativeSolde($user_id)
    {
        $initial_solde = 1;
        $monthly_solde = 1.5;
        $days_in_month = 30;

        $cumulative_solde = $initial_solde;

        for ($i = 1; $i <= 12; $i++) {
            $cumulative_solde += $monthly_solde;

            if ($cumulative_solde >= $days_in_month) {
                $cumulative_solde += 1.5;
                $days_in_month += 30;
            }
        }


        $user = User::find($user_id);

        // Set the value of the soled field to the value of $sum
        $user->solde = $cumulative_solde;

        // Save the changes to the database
        $user->save();
        return $cumulative_solde;
    }

*/


    /*public function calculateCumulativeSoldePerMonth($user_id)
    {
        $initial_solde = 1;
        $monthly_solde = 1.5;
        $days_in_month = 30;

        $cumulative_solde = $initial_solde;

        $result = [];

        for ($i = 1; $i <= 12; $i++) {
            $cumulative_solde += $monthly_solde;

            if ($cumulative_solde >= $days_in_month) {
                $cumulative_solde += 1.5;
                $days_in_month += 30;
            }

            $result[] = $cumulative_solde;
        }



        $user = User::find($user_id);

        // Set the value of the soled field to the value of $sum
        $user->solde = $result;

        // Save the changes to the database
        $user->save();
        return $result;
    }
*/


  /*  public function getMonthlySolde($user_id)
    {
        $initial_solde = 1;
        $monthly_solde = 1.5;
        $days_in_month = 30;

        $cumulative_solde = $initial_solde;
        $monthly_solde_array = array();

        // ajouter le solde initial
        $monthly_solde_array[0] = $initial_solde;

        for ($i = 1; $i <= 12; $i++) {
            $cumulative_solde += $monthly_solde;

            if ($cumulative_solde >= $days_in_month) {
                $cumulative_solde += 1.5;
                $days_in_month += 30;
            }

            // ajouter le solde cumulé du mois
            $monthly_solde_array[$i] = $cumulative_solde;

            // afficher le mois précédent avec le solde total
            if ($i > 1) {
                echo "Le solde total du mois précédent était " . $monthly_solde_array[$i-1] . "<br>";
            }
        }

        $user = User::find($user_id);

        // Set the value of the soled field to the value of $sum
        $user->solde = $monthly_solde_array;

        // Save the changes to the database
        $user->save();
        return $monthly_solde_array;
    }

*/
/*
public function getMonthlySolde($user_id)
{
    $initial_solde = 1;
    $monthly_solde = 1.5;
    $days_in_month = 30;

    $cumulative_solde = $initial_solde;
    $monthly_solde_array = array();

    // add the initial balance to the array
    $monthly_solde_array[1] = $initial_solde;

    for ($i = 2; $i <= 12; $i++) {
        $cumulative_solde += $monthly_solde;

        if ($cumulative_solde >= $days_in_month) {
            $cumulative_solde += 1.5;
            $days_in_month += 30;

            // add the total balance for the previous month plus 1.5
            $monthly_solde_array[$i-1] += 1.5;
        }

        // add the cumulative balance for the current month
        $monthly_solde_array[$i] = $cumulative_solde;
    }
    $user = User::find($user_id);

    // Set the value of the soled field to the value of $sum
    $user->solde = $monthly_solde_array;

    // Save the changes to the database
    $user->save();
    return $monthly_solde_array;
}

*//*
public function calculateMonthlyCongeSolde(User $user)
{
    $initial_solde = 1;
    $monthly_solde = 1.5;
    $days_in_month = 30;

    $cumulative_solde = $initial_solde;
    $monthly_solde_array = [];

    // ajouter le solde initial
    $monthly_solde_array[0] = [
        'month' => 'Initial',
        'solde' => $initial_solde
    ];

    for ($i = 1; $i <= 12; $i++) {
        // Vérifier le type de congé et le solde restant
        if ($user->conge_type == 'malade' || $user->conge_type == 'solde') {
            if ($user->conge_solde >= $monthly_solde) {
                // Ajouter le solde mensuel au solde cumulé
                $cumulative_solde += $monthly_solde;

                // Si le solde cumulé dépasse le nombre de jours dans le mois, ajouter 1,5 jour de congé
                if ($cumulative_solde >= $days_in_month) {
                    $cumulative_solde += 1.5;
                    $days_in_month += 30;
                }

                // Déduire le solde de congé de l'utilisateur
                $user->conge_solde -= $monthly_solde;

                // Sauvegarder l'utilisateur
                $user->save();

                // ajouter le solde cumulé du mois
                $monthly_solde_array[$i] = [
                    'month' => $i,
                    'solde' => $cumulative_solde
                ];
            } else {
                // Afficher le message d'erreur "Solde insuffisant"
                $monthly_solde_array[$i] = [
                    'month' => $i,
                    'solde' => 0,
                    'message' => 'Solde insuffisant'
                ];
            }
        } else {
            // Afficher le message d'erreur "Type de congé invalide"
            $monthly_solde_array[$i] = [
                'month' => $i,
                'solde' => 0,
                'message' => 'Type de congé invalide'
            ];
        }
    }

    return $monthly_solde_array;
}

*/

