<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
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

    public function sup_membre($id) // pour supprimer un membre
    {
        $user = user::findorfail($id);
        $user->delete();
        return back()->with('success', 'Le membre a été supprimé.');
    }
}
