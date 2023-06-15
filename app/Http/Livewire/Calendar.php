<?php

namespace App\Http\Livewire;

use App\Models\Projet;
use App\Models\tache;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Holiday;


class Calendar extends Component
{
    public $taches = [];
    public function mount()
    {
        $user = Auth::user();
        $isRh = $user->hasRole('DirecteurRH') || $user->hasRole('Admin');
        $nomEmploye = $user->name;
        $prenom=$user->prenom;

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
                'prenom' => $isRh ? $tache->user->prenom : $prenom,
                'title' => $tache->nom,
                'projet' => $projet->titre,
                'localisation' => $tache->localisation,
                'description' => $tache->description,
                'start' => $tache->debut,
                'end' => $tache->fin,
                'nbh' => $tache->nb_heures,
            ];
        }
        $holidays = Holiday::all();

        // Ajouter les jours fériés à votre tableau de tâches
        foreach ($holidays as $holiday) {
            $this->taches[] = [
                'title' => $holiday->name,
                'start' => $holiday->date,
                'end' => $holiday->date2,
                'color' => 'lightgreen',
                'textColor' => 'black', // Couleur du texte pour les jours fériés
                'editable' => false, // Jours fériés non éditables
                'selectable' => false, // Jours fériés non sélectionnables
           'isHoliday' => true, // Propriété pour identifier les jours fériés
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
