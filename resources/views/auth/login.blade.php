@extends('layouts.static')

@section('content')

<div class="panel panel-default">
    <h3>Connexion</h3>

    <form class="popup-form" role="form" method="POST" action="{{ url('login') }}">
        {{csrf_field()}}
        <p class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" placeholder="Pseudo *" class="username" required>
            @if ($errors->has('username'))
                <span class="">{{ $errors->first('username') }}</span>
            @endif
        </p>
        <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Mot de passe</label>
            <input name="password" type="password" placeholder="Mot de passe *" class="password" required>
            @if ($errors->has('password'))
                <span class="">{{ $errors->first('password') }}</span>
            @endif
        </p>
        <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
        </p>
        <p>
            <input class="submit" type="submit" value="Se connecter" id="connecter">
        </p>
    </form>

    <p class="popup-signin">
        <a href="#">Si vous n'avez pas vos identifiant, demandez-les auprès de Jean-Paul, 3e étage salle 306.</a>
    </p>

    <!-- <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div> -->
</div>

@endsection
