<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class CongeController extends Controller
{
    public function index(Request $request)
    {
        $query = Conge::query();

        if (auth()->user()->hasRole('employe')) {
            $query->where('user_id', auth()->user()->id);
        }

        if ($request->filled('name')) {
            $query->whereHas('user', function ($userQuery) use ($request) {
                $userQuery->where('name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('statut')) {
            $query->where('status', $request->statut);
        }

        $conges = $query->paginate(5);

        // Loop through each "conge" to calculate the duration in days
        foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Add the "duree" property to the "Conge" model
        }

        $user = Auth::user();

    // Regrouper les congés par type
    $congesParType = $conges->groupBy('type_conge');

    // Passer les données à la vue
    return view('conges.index', compact('conges', 'congesParType'));
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
            'status' => 'required|in:en attente,accepte,refuse',
        ]);

       
        // Create the "conge" model
        Conge::create([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status,
        ]);


            return redirect()->route('conges.user')->with('success', 'Le congé a été ajouté avec succès.');


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
            'status' => 'required|in:en attente,accepte,refuse',
        ]);

       
        $user = User::find($request->user_id);

       
        if (
            $request->status == 'accepte'
            && ($request->type_conge == 'conge solde' || $request->type_conge == 'conge malade')
            && ($user->solde >= $conge->duree)
        ) {

            $user->solde = $user->solde - $request->conge_duree;
            $user->save();
        }
        $conge->update([
            'user_id' => $request->user_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_conge' => $request->type_conge,
            'status' => $request->status,
        ]);

        return redirect()->route('conges.user')->with('success', 'Le congé a été modifié avec succès.');
    }

    public function destroy(Conge $conge)
    {
        $conge->delete();
        return redirect()->route('conges.user')->with('success', 'Le congé a été supprimé avec succès.');
    }

    public function show(Conge $conge)
    {

        return view('conges.show', compact('conge'));
    }

    public function userConges(Request $request)
    {
        $status = $request->input('status'); // Récupérer la valeur du statut depuis la requête

        $conges = auth()->user()->conges();

        // Filtrer les congés en fonction du statut
        if ($status) {
            $conges->where('status', $status);
        }

        $conges = $conges->get();

        foreach ($conges as $conge) {
            $dateDebut = new DateTime($conge->date_debut);
            $dateFin = new DateTime($conge->date_fin);
            $duree = $dateDebut->diff($dateFin)->days;
            $conge->duree = $duree; // Ajouter la propriété "duree" au modèle "Conge"
        }

        // Passer les résultats à la vue "conges.user"
        return view('conges.user', compact('conges'));
    }


    public function congestate($congeId, $status)
{
    $conge = Conge::find($congeId);

    $startDate = Carbon::parse($conge->date_debut);
    $endDate = Carbon::parse($conge->date_fin);

    $leavePeriod = $startDate->diffInDays($endDate);

    $soldeConge = (int) $conge->user->solde;

    if ($conge) {
        if ($status == 'accepte') {
            $conge->status = 'accepte';

            if (
               ( $conge->type_conge == 'conge solde' || $conge->type_conge == 'conge malade')
                && ($soldeConge >= $leavePeriod)
            ) {
                $conge->user->solde = $soldeConge - $leavePeriod;
                $conge->user->save();
            }

            $conge->save();

            return redirect()->route('conges.index')->with('success', 'Le congé a été accepté avec succès.');

        } elseif ($status == 'refuse') {
            // Mettre à jour le statut du congé à "refuse"
            $conge->status = 'refuse';
            $conge->save();

            // Traiter les actions supplémentaires pour refuser le congé
            // ...

            return redirect()->route('conges.index')->with('success', 'Le congé a été refusé avec succès.');
        }
    }

    return redirect()->route('conges.index')->with('error', 'La demande de congé n\'existe pas.');
}

}
