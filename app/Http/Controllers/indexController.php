<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class indexController extends Controller
{ public function __construct()

    {$this->middleware('auth');
    }

    public function index()
    {


        return view('/accueil');

    }


}
