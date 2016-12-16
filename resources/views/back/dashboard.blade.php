@extends('layouts.back')


@section ('content')
<div>
    <h2>Gestion des élèves</h2>
    
    @foreach($users as $user)
    <div class="ctt-user">
        {{$user->username}}
    </div>
    @endforeach 

    <a href="">Voir tous les élèves</a>
</div>

<div>
    <h2>Gestion des articles</h2>

    @foreach($posts as $post)
    <div class="ctt-post">
        {{$post->title}}
    </div>   
    @endforeach

    <a href="{{ action('PostController@index')}}">Voir tous les articles</a>
</div>

       
 @endsection