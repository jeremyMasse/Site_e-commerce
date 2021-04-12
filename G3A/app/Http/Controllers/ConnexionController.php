<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connexionController extends Controller
{
    public  function connexion(){ //affichage de la page de connexion
        return view('connexion');
    }

    public function formulaire() //validation de la connexion
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $result = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($result) {
            return redirect('/catalogue');
        }
        return back()->withErrors([
            'email' => "Les identifiants de connexion sont incorrects"
        ]);
    }
}
