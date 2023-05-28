<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $fillable = [
        'name',
        'prenom',
        'phone',
        'address',
        'avatar',
        'position',
        'cin',
        'ville',
        'num_emp',
        'date_naiss',
        'codepostal',
        'email',
        'password',
        'solde',
        'salaire',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array

     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function conges()
    {
        return $this->hasMany(Conge::class);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array

     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function updateSoldeOnDemandeConge($conge)
    {
        $solde = $this->solde;

        // Vérifier si l'utilisateur a demandé un congé malade ou un congé payé
        if ($conge->type_conge == 'conge malade' || $conge->type_conge == 'conge solde') {
            // Vérifier si le nombre de jours de congé demandé est inférieur ou égal au solde
            if ($conge->duree <= $solde) {
                // Mettre à jour le solde en soustrayant le nombre de jours demandés de la valeur actuelle du solde
                $solde = $solde - $conge->duree;
                $this->solde = $solde;
                $this->save();
                return 'Votre demande de congé a été acceptée avec succès. Votre nouveau solde est de ' . $solde . ' jour(s).';
            } else {
                return 'Votre solde de congé est insuffisant pour demander un congé de cette durée.';
            }
        }
    }




}
