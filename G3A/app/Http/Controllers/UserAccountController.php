<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\commande;

class UserAccountController extends Controller
{

    public function deconnexion() //deconnexion
    {
        auth()->logout();

        return redirect('/connexion');
    }


    public function password_modification() //fonction pour modifier un mot de passe
    {
        request()->validate([
            'old_password' =>['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required']
        ]);
        
        $user = auth()->user();
        if(bcrypt(request('password') == $user->password)){
            $user->password = bcrypt(request('password'));
            $user->save();
        }
        return redirect('/profil');
    }
}
