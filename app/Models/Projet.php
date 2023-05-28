<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'debut','fin'
    ];
    public function taches()
    {
        return $this->hasMany(tache::class);
    }
}
