@extends('layout')

@section('contenu')
<div class="contain">
    <form action="/connexion" method="post" class="mt-3 mb-3 form_connect">
        {{csrf_field()}}
        <div class="form-group">
            <label for="InputEmail">Adresse mail :</label>
            <input type="email" class="form-control" id="InputEmail" name="email" value="{{old('email')}}" aria-describedby="emailHelp">
            @if($errors->has('email'))
            <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="InputPassword">Mot de passe : </label>
            <input type="password" class="form-control" id="InputPassword" name="password" label="password">
            @if($errors->has('password'))
            <small id="emailHelp" class="form-text text-muted">{{$errors->first('password')}}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>
<br>
<br>
@endsection