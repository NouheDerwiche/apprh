<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function __construct()
    {
        $this->middleware('permission:Voir-Taches|Ajouter-Taches|Modifier-taches|Supprimer-taches', ['only' => ['index', 'store']]);
        $this->middleware('permission:Ajouter-Taches', ['only' => ['create', 'store']]);
        $this->middleware('permission:Modifier-taches', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Supprimer-taches', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $user = Auth::user();
        $taches = $user->taches();

        $search = $request->input('term');
        if ($search) {
            // Appliquer la condition de recherche
            $taches->where('nom', 'like', '%' . $search . '%');
        }
        $taches = $user->taches()->paginate(2);

        $projets = Projet::all();



        return view('tache.index', compact('taches', 'projets','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projets = projet::all();

        return view('tache.create', compact('projets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projet_id' => 'required',
            'nom' => 'required',
            'description' => 'required',
            'localisation' => 'required',
            'debut' => 'required',
            'fin' => ['required' ,'after_or_equal:debut'],
            'nb_heures' => 'required',
        ]);

        $tache = new tache;
        $tache->user_id = auth()->user()->id; // Assigner l'ID de l'utilisateur actuellement authentifié
        $tache->projet_id = $request->projet_id;
        $tache->nom = $request->nom;
        $tache->description = $request->description;
        $tache->localisation = $request->localisation;
        $tache->debut = $request->debut;
        $tache->fin = $request->fin;
        $tache->nb_heures = $request->nb_heures;

        $tache->save();

        return redirect()->route('calendar')
            ->with('success', 'Tâche créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tache = Tache::find($id);
        return view('tache.show', compact('tache'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $tache = Tache::find($id);
        $projets = projet::all();

        return view('tache.edit', compact('tache', 'projets'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'projet_id' => 'required',
            'nom' => 'required',
            'description' => 'required',
            'localisation' => 'required',
            'debut' => 'required',
            'fin' => ['required', 'after_or_equal:debut'],
            'nb_heures' => 'required',
        ]);

        $input = $request->all();

        $tache = tache::findOrFail($id); // Utilisation de minuscule pour le modèle Tache
        $tache->update($input);

        return redirect()->route('tache.index')->with('success', 'Tâche mise à jour avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tache = Tache::find($id);
        $tache->delete();

        return redirect()->route('tache.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
