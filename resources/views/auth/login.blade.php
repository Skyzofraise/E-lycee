@extends('layouts.static')

@section('banner')
    <div class="banner banner-small flex">
        
    </div>
@endsection

@section('content')

    <h3>Connexion</h3>

    <form class="popup-form" role="form" method="POST" action="{{ url('login') }}">
        {{csrf_field()}}
        <p class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username">Nom d'utilisateur <b class="help-block">*</b></label>
            <input type="text" name="username" placeholder="Nom d'utilisateur *" class="username" required>
            @if ($errors->has('username'))
                <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
            @endif
        </p>
        <p class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="password">Mot de passe <b class="help-block">*</b></label>
            <input name="password" type="password" placeholder="Mot de passe *" class="password" required>
            @if ($errors->has('username'))
                <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
            @endif
        </p>
        <p class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Se souvenir de moi
                </label>
            </div>
        </p>
        <p>
            <input class="submit" type="submit" value="Se connecter" id="connecter">
        </p>
        <a class="btn btn-link" href="{{ url('/password/reset') }}">
            Tu as oublié ton mot de passe ?
        </a>
    </form>

    <p>Si vous ne connaissez pas vos identifiants, demandez-les auprès de Jean-Paul (3e étage salle 306).</p>

@endsection