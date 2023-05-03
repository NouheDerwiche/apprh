<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Conge;
use Illuminate\Http\Request;




class CongeController extends Controller
{
    public function index()
    {
        if( auth()->user()->hasRole('employe') ){
            $conges = auth()->user()->conges;
        }else{
            $conges = Conge::all();
        }

        // Loop through each "conge" to calculate the duration in days
        foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Add the "duree" property to the "Conge" model
        }

        // Display the "conges.index" view for users without a role
        return view('conges.index', compact('conges'));
    }

    public function create()
    {
        $users = User::all();
        return view('conges.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required|in:conge malade,conge maternite,conge solde,conge non solde',
            'status' => 'required|in:en attente,accepte,refuse'
        ]);

        // Calculate the balance of the user based on their work days and leave days, taking into account approved leave requests
        $user = User::findOrFail($request->user_id);
        $workDays = $user->work_days;
        $leaveDays = $user->leave_days;
        $approvedLeaves = $user->conges()->where('status', 'accepte')->get();
        foreach ($approvedLeaves as $leave) {
            $dateDebut = new DateTime($leave->date_debut);
            $dateFin = new DateTime($leave->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $leaveDays -= $duree;
        }
        $nonWorkDays = $this->countNonWorkDays($request->date_debut, $request->date_fin);
        $workDays += $nonWorkDays * 1.5;
        if ($request->type_conge == 'conge solde') {
            if ($leaveDays >= $request->duree) {
                $leaveDays -= $request->duree;
            } else {
                return redirect()->back()->with('error', 'Balance insuffisante.');
            }
        }

        // Create the "conge" model
        Conge::create([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status
        ]);

        if( auth()->user()->hasRole('rh') ){
            return redirect()->route('conges.index')->with('success', 'Le congé a été ajouté avec succès.');

        }else{
            return redirect()->route('conges.user')->with('success', 'Le congé a été ajouté avec succès.');
        }
    }

    public function edit(Conge $conge)
    {
        $users = User::all();
        return view('conges.edit', compact('conge', 'users'));
    }

    public function update(Request $request, Conge $conge)
    {
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required|in:conge malade,conge maternite,conge solde,conge non solde',
            'status' => 'required|in:en attente,accepte,refuse'
        ]);

        // Calculate the balance of the user based on their work days and leave days, taking into account approved leave requests
        $user = User::findOrFail($request->user_id);
        $workDays = $user->work_days;
        $leaveDays = $user->leave_days;
        $approvedLeaves = $user->conges()->where('status', 'accepte')->get();
        foreach ($approvedLeaves as $leave) {
            $dateDebut = new DateTime($leave->date_debut);
            $dateFin = new DateTime($leave->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $leaveDays -= $duree;
        }
        $nonWorkDays = $this->countNonWorkDays($request->date_debut, $request->date_fin);
        $workDays += $nonWorkDays * 1.5;
        if ($request->type_conge == 'conge solde') {
            if ($leaveDays + $conge->duree >= $request->duree) {
                $leaveDays -= ($request->duree - $conge->duree);
            } else {
                return redirect()->back()->with('error', 'Balance insuffisante.');
            }
        }

        // Update the "conge" model
        $conge->update([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status
        ]);

        return redirect()->route('conges.index')->with('success', 'Le congé a été modifié avec succès.');
    }

    public function destroy(Conge $conge)
    {
        $conge->delete();
        return redirect()->route('conges.index')->with('success', 'Le congé a été supprimé avec succès.');
    }

    public function show(Conge $conge)
    {
        return view('conges.show', compact('conge'));
    }

    // Ajouter une méthode pour utiliser la vue "rh"
    public function userConges()
    {
        // Retrieve the authenticated user's "conges" models from the database
        $conges = auth()->user()->conges;

        // Loop through each "conge" to calculate the duration in days
        foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Add the "duree" property to the "Conge" model
        }

        // Display the "conges.user" view for the authenticated user
        return view('conges.user', compact('conges'));
    }

    // Helper function to count non-work days between two dates
    private function countNonWorkDays($dateDebut, $dateFin)
    {
        $count = 0;
        $date = new DateTime($dateDebut);
        while ($date <= new DateTime($dateFin)) {
            if ($date->format('N') > 5) {
                $count++;
            }
            $date->modify('+1 day');
        }
        return $count;
    }
}






/*
class CongeController extends Controller
{
    public function index()
    {


        if( auth()->user()->hasRole('employe') ){
            $conges = auth()->user()->conges;

        // Retrieve all the "conges" models from the database
        }else{
        $conges = Conge::all();
        }

        // Loop through each "conge" to calculate the duration in days
        foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Add the "duree" property to the "Conge" model
        }

        // Display the "conges.index" view for users without a role
        return view('conges.index', compact('conges'));
    }
    public function create()
    {

        $users = User::all();
        return view('conges.create', compact('users'));
    }



    public function store(Request $request)
    {



        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required|in:conge malade,conge maternite,conge solde,conge non solde',
            'status' => 'required|in:en attente,accepte,refuse'
        ]);

        Conge::create([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status
        ]);

        if( auth()->user()->hasRole('rh') ){
            return redirect()->route('conges.index')->with('success', 'Le congé a été ajouté avec succès.');

        }else{
        return redirect()->route('conges.user')->with('success', 'Le congé a été ajouté avec succès.');
    }
}

    public function edit(Conge $conge)
    {
        $users = User::all();
        return view('conges.edit', compact('conge', 'users'));
    }


    public function update(Request $request, Conge $conge)
    {
        $request->validate([
            'user_id' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required|in:conge malade,conge maternite,conge solde,conge non solde',
            'status' => 'required|in:en attente,accepte,refuse'
        ]);

        $conge->update([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status
        ]);

        return redirect()->route('conges.index')->with('success', 'Le congé a été modifié avec succès.');
    }

    public function destroy(Conge $conge)
    {
        $conge->delete();
        return redirect()->route('conges.index')->with('success', 'Le congé a été supprimé avec succès.');
    }
    public function show(Conge $conge)
    {
        return view('conges.show', compact('conge'));
    }

     // Ajouter une méthode pour utiliser la vue "rh"


     public function userConges()
     {
         // Retrieve the authenticated user's "conges" models from the database
         $conges = auth()->user()->conges;

         // Loop through each "conge" to calculate the duration in days
         foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Add the "duree" property to the "Conge" model
        }
         // Display the "conges.user" view for the authenticated user
         return view('conges.user', compact('conges'));
     }






     public function updateSoldeOnDemandeConge($user_id, $conge)
     {
         $user = User::find($user_id);
         $solde = $user->solde;

         // Vérifier si l'utilisateur a demandé un congé malade ou un congé payé
         if ($conge->type_conge == 'conge malade' || $conge->type_conge == 'conge solde') {
             // Vérifier si le nombre de jours de congé demandé est inférieur ou égal au solde
             if ($conge->duree <= $solde) {
                 // Mettre à jour le solde en soustrayant le nombre de jours demandés de la valeur actuelle du solde
                 $solde = $solde - $conge->duree;
                 $user->solde = $solde;
                 $user->save();
                 return 'Votre demande de congé a été acceptée avec succès. Votre nouveau solde est de ' . $solde . ' jour(s).';
             } else {
                 return 'Votre solde de congé est insuffisant pour demander un congé de cette durée.';
             }
         }



     }






}
*/
