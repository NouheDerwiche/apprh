<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [    'status',
    'type_conge',
    'date_debut',
    'date_fin',
    'solde_conge_annuel',
    'solde_conge_mensuel',
    'user_id',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calculer_duree_conge(Conge $conge)
    {
        $duree = nombre_jours_entre_deux_dates($conge->date_debut, $conge->date_fin);
        // faire quelque chose avec la durée...
    }





}
