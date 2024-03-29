<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\NouveauCompteMail;
use App\Models\Parametre;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:Voir-liste-utilisateur|Ajouter-utilisateur|Modifier-utilisateur|Supprimer-utilisateur', ['only' => ['index', 'store']]);
        $this->middleware('permission:Ajouter-utilisateur', ['only' => ['create', 'store']]);
        $this->middleware('permission:Modifier-utilisateur', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Supprimer-utilisateur', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {

        // Récupérer les utilisateurs depuis la base de données
        $data = User::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }],
        ])
            ->orderBy('id', 'DESC')
            ->paginate(5);

        foreach ($data as $user) {
            $solde = $user->solde;
        }
        $user = Auth::user();
        $solde = $user->solde;

        $params = Parametre::firstOrFail();

        $isUpdatedThisMonth = Carbon::createFromFormat('Y-m-d H:i:s', $params->last_solde_updated_at)->isCurrentMonth();

        return view('users.index', compact('data', 'isUpdatedThisMonth'))->with('i', ($request->input('page', 1) - 1) * 5);

 // Récupérer les rôles des utilisateurs depuis la base de données
 $roles = Role::pluck('name');

 // Compter le nombre d'utilisateurs par rôle
 $userCountByRole = User::groupBy('role_id')
     ->select('role_id', DB::raw('count(*) as total'))
     ->pluck('total', 'role_id');

 // Générer les données pour le graphique pie
 $pieData = new Collection();
 foreach ($roles as $role) {
     $count = $userCountByRole->get($role->id, 0);
     $pieData->push([
         'role' => $role->name,
         'count' => $count,
     ]);
 }



 // Convertir les données en format JSON
 $pieDataJson = $pieData->toJson();



 return view('chartjs', compact('pieDataJson'));
        

    }

   
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
    }

  
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
            'cin' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'avatar' => 'required|image|max:1024',
            'salaire' => 'nullable|numeric',

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
// Vérifier si l'utilisateur a téléchargé une image
        if ($request->hasFile('avatar')) {
            // Obtenir le fichier image téléchargé
            $avatar = $request->file('avatar');

            // Générer un nom de fichier unique
            $filename = time() . '_' . uniqid() . '.' . $avatar->getClientOriginalExtension();

            // Stocker l'image dans le dossier de destination
            $avatar->storeAs('public/assets/media/avatars', $filename);

            // Ajouter le nom du fichier à l'entrée utilisateur
            $input['avatar'] = $filename;
        }
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        // Envoi de l'e-mail à l'utilisateur
        $this->sendEmail($user, $request->password);

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur créé avec succès');
    }

   
   
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'prenom' => 'required',
            'roles' => 'required',
            'annual_balance' => 'nullable|numeric',
            'monthly_balance' => 'nullable|numeric',
            'salaire' => 'nullable|numeric',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'Utilisateur mis à jour avec succès');
    }

 
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
    public function updateSolde()
    {
        $today = Carbon::now();
        $params = Parametre::firstOrFail();

        $lastSoldeUpdatedAt = Carbon::createFromFormat('Y-m-d H:i:s', $params->last_solde_updated_at);
        if ($today->month > $lastSoldeUpdatedAt->month && $today->day > 20) {
            User::increment('solde', 1.5);

            // Update table parametres
            $params->last_solde_updated_at = $today;
            $params->save();

            return back()->with('success', 'Solde mis à jour avec succès.');
        }

        return back()->with('error', 'Impossible de mettre à jour solde pour le moment.');
    }

    protected function sendEmail(User $user, $password)
    {
        Mail::to($user->email)->send(new NouveauCompteMail($user, $password));
    }

}
