@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Vous êtes déjà connecté</h3>
                </div>

                <div class="panel-body text-center">
                    <p>Vous souhaitez peut-être accéder à :</p>
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary" role="button">Dashboard</a>
                    <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="btn btn-primary">Déconnexion</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
