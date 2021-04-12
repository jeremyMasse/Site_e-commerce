@extends('layout')

@section('contenu')
<form class="form_contact" action="#" method="post">

    <div>
        <input type="string" name="nom" placeholder="Nom">
    </div>

    <div>
        <input type="string" name="prenom" placeholder="Prenom">
    </div>

    <div>
        <input type="email" id="email" name="email" placeholder="email">
    </div>

    <div>
        <textarea id="message" name="message" placeholder="Message" cols="49" rows="3"></textarea>
    </div>

    <div>
        <input type="submit" value="Envoyer">
    </div>

</form>
@endsection

<style>
    .form_contact {
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