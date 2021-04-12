<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class inscriptionController extends Controller
{
    public  function inscription(){ //afficher la page inscription
        return view('inscription');
    }
    
    public function formulaire(Request $request)//ajout d'un utilisateur à la bdd
    { 
        request()->validate([
            'nom' =>['required'],
            'prenom' =>['required'],
            'email' =>['required','email'],
            'ville' =>['required'],
            'adresse' =>['required'],
            'pays' =>['required'],
            'dtn' =>['required'],
            'code_postal' =>['required'],
            'mdp' =>['required','confirmed','min:8'],
            'mdp_confirmation' =>['required'],
        ]);
        $date = date('Y-m-d', strtotime(str_replace('/','-',$request->dtn))); // formatage de la date
        $user = User::create([ 
            'prenom' => request('prenom'),
            'nom' => request('nom'),
            'email' => request('email'),
            'ville' => request('ville'),
            'adresse' => request('adresse'),
            'pays' => request('pays'),
            'dtn' => $date,
            'code_postal' =>request("code_postal"),
            'password' => bcrypt(request('mdp')), 
        ]);
        
        
        return view('index')->with('success', "Vous etes bien inscrit");
    }
}
