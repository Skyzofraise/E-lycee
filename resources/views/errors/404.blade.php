@extends('layouts.static')

@section('content')
    <style>
        .content { text-align: center; display: block; color: #aaa; width: 100%; }
        h1 { font-size: 100px; }
        .title { font-size: 72px; margin-bottom: 40px; }
    </style>
    <div class="container">
        <div class="content">
            <h1>404</h1>
            <!-- <div class="title">Erreur, erreur.<br>Fais demi-tour, vite !</div> -->
            <div class="title">
                Hmm... Something's wrong here.<br>
                Go back to <a href="{{url('')}}">Home</a>?
            </div>
        </div>
    </div>

@endsection
