<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\produit;

class PanierController extends Controller
{
    public function panier() //affichage du panier
    {
        return view("panier");
    }

    // public function commande() creation d'une commande pour l'enregistrement dans la BDD en bonus 
    // {
    //     auth()->membre()->commande()->create([
    //         'date_commande' => Carbon::now(),
    //         'prix_commande' => 0,
    //         'statut' => "a payer",
    //     ]);
        
    // }
    public function store(Request $request) //ajout d'un produit au panier
    {
        //Pour ne pas avoir de doublon
        // $doublon = Cart::search(function ($cartItem, $rowId) use ($request){
        //     return $cartItem->id = $request->produit;
        // });

        // if(empty($doublon)){
        //     return back()->with('success', 'Le produit a déjà été ajouté au panier');
        // }
        $produit = produit::find($request->produit);
        Cart::add($produit->id, $produit->nom, 1, $produit->prix)
        ->associate('App\Models\produit');

        return back()->with('success', 'Le produit a été ajouté au panier');
    }

    public function supprimer($rowId)
    { //supprimer un item du panier
        Cart::remove($rowId);
        return back()->with('success', 'Le produit a été supprimé.');
    }

    public function supprimer_cart() //supprimer le panier entier
    {
        Cart::destroy();
        return back()->with('success', 'votre panier a bien été vidé');
    }
}
