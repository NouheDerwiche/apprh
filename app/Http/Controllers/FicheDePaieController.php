<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fiche_de_paie;
use App\Models\User;

use Barryvdh\DomPDF\Facade as PDF;

class FicheDePaieController extends Controller
{
    public function create()
    {
        $users = User::all();

        return view('fiche_de_paie.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|date',
            'salaire_total' => 'required|numeric',
            'salairefinal' => 'required|numeric',
        ]);

        fiche_de_paie::create($request->all());

        return redirect()->route('fiche_de_paie.index')->with('success', 'Fiche de paie ajoutée avec succès.');
    }

    public function index()
    {
        $fichesDePaie = fiche_de_paie::all();

        return view('fiche_de_paie.index', compact('fichesDePaie'));
    }

    public function show($id)
    {
        $ficheDePaie = fiche_de_paie::findOrFail($id);

        return view('fiche_de_paie.show', compact('ficheDePaie'));
    }

    public function edit($id)
    {
        $ficheDePaie = fiche_de_paie::findOrFail($id);
        $users = User::all();

        return view('fiche_de_paie.edit', compact('ficheDePaie', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'month' => 'required|date',
            'salaire_total' => 'required|numeric',
            'salairefinal' => 'required|numeric',
        ]);

        $ficheDePaie = fiche_de_paie::findOrFail($id);
        $ficheDePaie->update($request->all());

        return redirect()->route('fiche_de_paie.index')->with('success', 'Fiche de paie mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $ficheDePaie = fiche_de_paie::findOrFail($id);
        $ficheDePaie->delete();

        return redirect()->route('fiche_de_paie.index')->with('success', 'Fiche de paie supprimée avec succès.');
    }

    public function imprimer($id)
    {
        $ficheDePaie = fiche_de_paie::findOrFail($id);

        $pdf = PDF::loadView('fiche_de_paie.pdf', compact('ficheDePaie'));

        return $pdf->download('fiche_de_paie.pdf');
    }
    
}
