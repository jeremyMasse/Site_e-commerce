@extends('layout')

@section('contenu')
<?php
    $rempli = "★";
    $vide = "☆";
    $i = 0;?> 
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
<div class="container_prod">
  <div class="col-lg-9">
    @if (!empty($produit))
      <div class="card mt-4 card-flex">
        <img src="<?php echo "images/".$produit->photo;?>" alt="test" class=" card-img-top img-fluid image_produit">
        <div class="card-body">
          <h3 class="card-title"> {{ $produit->nom }} </h3>
          <p class="card-text espace-prod">{{ $produit->description }}</p>
          <span class="text-warning">
            @while($i < 5)
              @if ($i < $produit->note)
                {{$rempli}}
              @else
                {{$vide}}
              @endif
              <?php $i = $i + 1; ?>
            @endwhile
          </span>
          <h4 class="prix-prod">Prix : {{ $produit->prix }}€</h4>
        </div>
      </div>
    @endif
      <form class="card mt-4 paiement_prod" action="/panier/ajouter" method="post">
          {{ csrf_field() }}
          {{method_field('post')}}
          @if($produit->quantite > 0)
            <input type="hidden", name="produit", value="{{ $produit->id }}">
            <button type="submit" class="btn btn-primary">Ajouter au panier</button>
          @else
            <button type="button" class="btn btn-primary" disabled="disabled">Produit indisponible</button>
          @endif
      </form>    
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Avis acheteur
      </div>
      <div class="card-body">
        @if (!empty($avis))
          @foreach ($avis as $avi)
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span> {{ $avi->note }}
            <p>{{ $avi->description }}</p>
            <small class="text-muted">Posté le {{ $avi->date_avi }} </small>
            <hr>
          @endforeach
        @else
          <p>Il n'y a aucun avi pour ce jeu</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection