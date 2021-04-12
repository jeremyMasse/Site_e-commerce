
@extends('layout')

@section('contenu')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="container-fluid mt-3">
    <div class="d-flex flex-column align-items-center mt-3 mb-3">
        <h1>Bienvenue sur la référence gaming</h1>
        <h3 class="mt-2 col-xl-4">Toutes les infos dont vous pourriez avoir besoin sur vos jeux préférés ! Ainsi que la possibilité de les acheter grâce à nos partenariats !</h3>
    </div>
</div>
@endsection