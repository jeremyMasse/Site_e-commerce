<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produit;
use App\Models\avi;

class ProduitController extends Controller
{
    //affichage de la page produit et envoie des avis contenu dans la BDD pour le jeu (la table n'est pas remplie)
    public function produit(int $id) 
    {
        $produit = produit::findorfail($id);
        //$avis = avi::where('id_produit', '=', $id );
        //return view('produit', compact('produit', 'avis'));
        return view('produit', [
            'produit' => $produit
            ]);
    }
}

