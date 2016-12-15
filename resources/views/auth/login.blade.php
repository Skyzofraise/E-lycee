@extends('layouts.static')

@section('content')

    <h2>Connexion</h2>
    <form class="" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}

        <p class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <!-- <label for="username">Nom d'utilisateur</label> -->
            <input type="text" name="username" placeholder="Pseudo *" class="username" required>
            @if ($errors->has('username'))
                <span class="">{{ $errors->first('username') }}</span>
            @endif
        </p>
        <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <!-- <label for="password">Password</label> -->
            <input name="password" type="password" placeholder="Mot de passe *" class="password" required>
            @if ($errors->has('password'))
                <span class="">{{ $errors->first('password') }}</span>
            @endif
        </p>
        <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div> -->

        <p>
            <input class="valider" type="submit" value="Se connecter" id="connecter">
        </p>
    </form>

@endsection
