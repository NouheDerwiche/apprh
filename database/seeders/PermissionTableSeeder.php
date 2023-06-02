<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-Voir-list',
            'role-Ajouter',
            'role-Modifier',
            'role-supprimer',
            'demandecongé-Voir-liste',
            'demandecongé-Ajouter',
            'demandecongé-Modifier',
            'demandecongé-supprimer',
            'Voir-liste-utilisateur',
            'Ajouter-utilisateur',
            'Modifier-utilisateur',
            'Supprimer-utilisateur',
            'jours fériés-Voir-liste',
            'jours fériés-Ajouter',
            'jours fériés-Modifier',
            'jours fériés-Supprimer',
            'Voir-calendrier',
            'Voir-Taches',
            'Supprimer-taches',
            'Modifier-taches',
            'Ajouter-Taches',
            'Voir-fiche de paie',
            'Supprimer-fiche de paie',
            'Ajouter-fiche de paie',
            'Modifier-fiche de paie',
            'Archiver-fiche de paie',
            'Ajouter projet',
            'Modifier projet',
            'Supprimer projet',
            'Voir_projet',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
