<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\tache;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TacheController extends Controller
{
    /**
     * Display a listing of the resource.

     */
    public function index()
    {
        $user = Auth::user();
        $taches = $user->taches;

        $projets = Projet::all();


        return view('calendar', compact('taches', 'projets'));
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
            'fin' => 'required',
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


        return redirect()->route('tache.index')
            ->with('success', 'Tâche créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
