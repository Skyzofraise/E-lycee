@extends('layouts.back')

@section ('content')

<div class="row">
    <div class="col-md-6 col-sm-12">
        <h2>Élèves</h2>
        
        @foreach($users as $user)
            {{$user->username}} <br />
        @endforeach 

        <a href="{{url('users')}}">Voir tous les élèves</a>
    </div>

    <div class="col-md-6 col-sm-12">
        <h2>Articles</h2>

        @foreach($posts as $post)
        <div class="ctt-post">
            {{$post->title}}
        </div>   
        @endforeach

        <a href="{{url('posts')}}">Voir tous les articles</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 back-statistiques">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span><b>Statistiques du site</b></span>
            </div>
            <div class="panel-body">
                <div class="col-md-3"><i class="fa fa-comment" aria-hidden="true"></i> {{ $stat_comments }} Commentaires </div>
                <div class="col-md-3"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ $stat_articles }} Articles publiés</div>
                <div class="col-md-3"><i class="fa fa-question-circle-o" aria-hidden="true"></i> {{ $stat_qcm }} QCMs</div>
                <div class="col-md-3"><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $stat_users }} Élèves </div>
            </div>
        </div>        
    </div>
</div>
       
 @endsection