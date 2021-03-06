@extends('layouts.static')

@section('banner')
    <div class="banner banner-small flex">
        
    </div>
@endsection

@section('content')

    <h3>Réinitialiser mon mot de passe</h3>

    <form class="popup-form" role="form" method="POST" action="{{ url('/password/email') }}">
        {{csrf_field()}}
        <p class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email *" class="email" required>
            @if ($errors->has('email'))
                <span class="">{{ $errors->first('email') }}</span>
            @endif
        </p>
        <p>
            <input class="submit" type="submit" value="Envoyer un lien de réinitialisation de mot de passe" id="connecter">
        </p>
    </form>

@endsection


<!-- 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Envoyer un lien de réinitialisation de mot de passe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection -->
