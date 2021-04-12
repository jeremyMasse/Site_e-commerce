<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cardcontroller extends Controller
{
    public function card() //Affichage de la carte banquaire
    {
        return view('card');
    }
}
