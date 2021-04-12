@extends('layout')

@section('contenu')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Mon Panier</h1>
        </div>
    </section>
    @if (Cart::count() > 0)
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Produit</th>
                                    <th scope="col" class="text-center">Quantité</th>
                                    <th scope="col" class="text-right">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( Cart::content() as $produit)
                                    <tr>
                                        <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                        <td>{{$produit->model->nom}} </td>
                                        <!-- Pour ajuster la quantité <td><input class="form-control" type="number"  value="1" min="1" max="5" /></td> -->
                                        <td class="text-center">1</td>
                                        <td class="text-right">{{ $produit->model->prix }} €</td>
                                        <td class="text-right">
                                        <form action="{{ '/panier/'.$produit->rowId }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> 
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>{{ Cart::subtotal() }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row container-btn">
                        <div class="col-sm-12  col-md-6">
                        <a class="continuer" href="/catalogue"><button class="btn btn-block btn-light btn-lg">Continuer mes achats</button></a>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <input class="btn btn-lg btn-block btn-success text-uppercase" type="button" value="Paiement" onclick="window.location.href='{{url('/card')}}'" />
                        </div>
                        <form action="{{ '/paniervider' }}" method="get" class="form-panier">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-lg btn-danger">Vider le panier</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class=" alert alert-success"> votre panier est vide</div>
    @endif
@endsection