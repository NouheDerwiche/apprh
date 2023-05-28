<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tache extends Model
{
    use HasFactory;
      public $timestamps = false;
      public $incrementing = false;
      protected $keyType = 'string';
      protected $fillable = ['nom','description','localisation', 'debut','fin','nb_heures'];
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}

