<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_solde_updated_at',
    ];

    protected $dates = [
        'last_solde_updated_at',
        'created_at',
        'updated_at',
    ];
}
