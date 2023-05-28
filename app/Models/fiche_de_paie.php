<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fiche_de_paie extends Model
{
    use HasFactory;
    
    protected $table = 'fiche_de_paie';

    protected $fillable = [
        'user_id',
        'month',
        'salaire_total',
        'salairefinal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
