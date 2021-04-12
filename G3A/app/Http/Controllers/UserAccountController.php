<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\commande;

class UserAccountController extends Controller
{

    
    public  function profil() //affichage de la page profil 
    {
        return view('profil', [
            'user' => auth()->user(),
            'users' => User::all(),
            'nbr_user' => User::count(),
        ]);
    }

    public function modifier_profil(Request $request) //fonction pour modifier le profil 
    {
        $user = user::findorfail($request->user);
        request()->validate([
            'nom' =>['required'],
            'prenom' =>['required'],
            'email' =>['required','email'],
            'ville' =>['required'],
            'adresse' =>['required'],
            'pays' =>['required'],
            'dtn' =>['required'],
            'cp' =>['required'],
        ]);

        $date = date('Y-m-d', strtotime(str_replace('/','-',$request->dtn)));
        $user = auth()->user();
        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = request('email');
        $user->ville = request('ville');
        $user->adresse = request('adresse');
        $user->pays = request('pays');
        $user->dtn = $date;
        $user->code_postal = request('cp');
        $user->save();
            return back()->with('success', "Vos coordonnées ont étés mises à jour");
    }

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
