@extends('layout')

@section('contenu')

    <div class="container bootstrap snipets">
    <h1 class="text-center text-muted">Catalogue Jeux</h1>
    <div class="row flow-offset-1">
    @foreach ($produits as $produit)
     <div class="col-xs-6 col-md-4 produit">
       <div class="product tumbnail thumbnail-3">
          <a href="{{ route('produit', [$produit->id]) }}">
            <img src="<?php echo "images/".$produit->photo;?>" alt="" class="image_produit">
          </a>
         <div class="caption">
           <h6><a href="{{ route('produit', [$produit->id]) }}">{{ $produit->nom }}</a> 
           <span class="plateforme">{{ $produit->plateforme }}</span></h6>
           @if($produit->quantite > 0)
            <span class="price">{{ $produit->prix }}€</span>
          @else
            <span class="price" style="color: red">Rupture de stock</span>
          @endif
         </div>
       </div>
     </div>
     @endforeach
 @endsection