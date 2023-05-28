<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tache;
use App\Models\User;
use App\Models\Projet;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class Calendar extends Component
{
    public $taches = [];
    public function mount()
    {
        $user = Auth::user();
        $isRh = $user->hasRole('RH');
        $nomEmploye = $user->name;

        if ($isRh) {
            $taches = Tache::all();
        } else {
            $taches = Tache::where('user_id', $user->id)->get();
        }

        $this->taches = [];

        foreach ($taches as $tache) {
            $projet = Projet::findOrFail($tache->projet_id);

            $this->taches[] = [
                'nom' => $isRh ? $tache->user->name : $nomEmploye,
                'title' => $tache->nom,
                'projet' => $projet->titre,
                'localisation' => $tache->localisation,
                'description' => $tache->description,
                'start' => $tache->debut,
                'end' => $tache->fin,
                'nbh' => $tache->nb_heures
            ];
        }
    }








    public function render()
    {
        $taches = Tache::all();
        return view('livewire.calendar', [
            'taches' => $taches->toJson(),
        ]);
    }


}
