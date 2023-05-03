<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $fillable = ['name', 'guard_name'];



}
