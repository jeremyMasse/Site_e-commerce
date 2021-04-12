@extends('layout')

@section('contenu')
<style>
    .form_inscription {
        /* Uniquement centrer le formulaire sur la page */
        margin: 1em auto 2em;
        width: 400px;
        /* Encadré pour voir les limites du formulaire */
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
    }

    form div+div {
        margin-top: 1em;
    }

    input {
        /* Pour s'assurer que tous les champs texte ont la même police.
     Par défaut, les textarea ont une police monospace */
        font: 1em sans-serif;

        /* Pour que tous les champs texte aient la même dimension */
        width: 365px;
        box-sizing: border-box;

        /* Pour harmoniser le look & feel des bordures des champs texte */
        border: 1px solid #999;
    }

    input:focus {
        /* Pour souligner légèrement les éléments actifs */
        border-color: #000;
    }
</style>

<form class="form_inscription" action="/inscription" method="post">

    {{csrf_field()}}

    <div>
        <input type="string" name="prenom" placeholder="Prenom">
        @if($errors->has('prenom'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('name')}}</small>
        @endif
    </div>

    <div>
        <input type="string" name="nom" placeholder="Nom">
        @if($errors->has('nom'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('nom')}}</small>
        @endif
    </div>
    
    <div>
        <input type="email" name="email" placeholder="Email">
        @if($errors->has('email'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
        <!-- <p>Email is mandatory</p> ou <p>{{$errors->first('email')}}</p> -->
        @endif
    </div>

    <div>
        <input type="date" name="dtn" placeholder="Date de naissance">
        @if($errors->has('dtn'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('dtn')}}</small>
        @endif
    </div>

    <div>
        <input type="string" name="adresse" placeholder="Adresse">
        @if($errors->has('adresse'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('adresse')}}</small>
        @endif
    </div>

    <div>
        <input type="string" name="ville" placeholder="Ville">
        @if($errors->has('ville'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('ville')}}</small>
        @endif
    </div>

    <div>
        <input type="string" name="pays" placeholder="Pays">
        @if($errors->has('pays'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('pays')}}</small>
        @endif
    </div>

    <div>
        <input type="string" name="code_postal" placeholder="Code postal">
        @if($errors->has('code_postal'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('code_postal')}}</small>
        @endif
    </div>

    <div>
        <input type="password" name="mdp" placeholder="Mot de passe">
        @if($errors->has('mdp'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('mdp')}}</small>
        @endif
    </div>

    <div>
        <input type="password" name="mdp_confirmation" placeholder="Confirmation mot de passe">
        @if($errors->has('mdp_confirmation'))
        <small id="emailHelp" class="form-text text-muted">{{$errors->first('mdp_confirmation')}}</small>
        @endif
    </div>

    <div>
        <input type="submit" value="Inscription">
    </div>

</form>
@endsection