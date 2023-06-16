<?php

namespace App\Http\Controllers;

use App\Models\fiche_de_paie;
use App\Models\User;
use App\Models\Conge;
use Illuminate\Http\Request;

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

        /*   $pdf = Pdf::loadView('fiche_de_paie.show', compact('ficheDePaie'));

    return $pdf->download('fiche_de_paie.pdf'); */
    }

    public function generer()
    {
        $employees = App\Models\User::all();
        foreach ($employees as $user) {
            $fiche = new Fiche();
            $fiche->user_id = $user->id;
            $fiche->month = date('m');
            $fiche->salaire_totale = $user->salaire;
            $fiche->save();

            $totale = 0;

            $detail1 = new FicheDetail();
            $detail1->fiche_id = $fiche->id;
            $detail1->code = '4404';
            $detail1->designation = "Salaire de base";
            $detail1->renumeration = $user->salaire;
            $detail1->save();
            $totale = $totale + $user->salaire;

            $conges = Conge::where('user_id', $user->id)
                ->where('type_conge', 'conge_non_solde')
                ->where('status', 'accepte')
                ->whereMonth($fiche->month)
                ->get();

            if ($conges->count() > 0) {
                foreach ($conges as $cg) {
                    # code...
                    $detail2 = new FicheDetail();
                    $detail2->fiche_id = $fiche->id;
                    $detail2->code = '5000';
                    $detail2->designation = "conges non solde " . $cg->date_debut;
                    $detail2->taux = '20%';
                    $detail2->renumeration = 0;
                    $detail2->retenu = $user->salaire * 0.2;

                    $detail2->save();
                    $totale = $totale - $detail2->retenu;
                }

            }
            $fiche->salairefinale = $totale;
            $fiche->save();

            return back();

            # code...
        }
    }

}
