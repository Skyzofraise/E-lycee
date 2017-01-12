@extends('layouts.back')

@section ('content')

<h2>Dashboard</h2>

<div class="row">
    <div class="col-md-12 back-statistiques">
        <div class="panel panel-info">
            <div class="panel-heading">
                <span><i class="fa fa-bar-chart" aria-hidden="true"></i> <b>Statistiques du site</b></span>
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

<div class="row">
    <div class="col-md-6 col-sm-12">
        <h3>QCMs</h3>
        
        <table class="table">
            @foreach($questions as $question)
            <tr>
                <td class="element-status">
                    @if( $question->status == 'published' )
                        <span class="label label-success"> </span>
                    @elseif( $question->status == 'unpublished' )
                        <span class="label label-warning"> </span>
                    @endif 
                </td>
                <td>
                    {{ date('d/m', strtotime($question->created_at)) }}
                </td>
                <td>{{$question->title}}</td>
            </tr>
            @endforeach 
            <tr>
                <td colspan="3">
                    <a href="{{url('questions')}}">Voir tous les QCMs</a>
                </td>
            </tr>
        </table>
    </div>

    <div class="col-md-6 col-sm-12">
        <h3>Actualités</h3>
        <table class="table">
            @foreach($posts as $post)
            <tr>
                <td class="element-status">
                    @if( $post->status == 'published' )
                        <span class="label label-success"> </span>
                    @elseif( $post->status == 'unpublished' )
                        <span class="label label-warning"> </span>
                    @endif 
                </td>
                <td>
                    {{ date('d/m', strtotime($post->created_at)) }}
                </td>
                <td>
                    {{ str_limit($post->title, 40) }}
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">
                    <a href="{{url('posts')}}">Voir tous les articles</a>
                </td>
            </tr>
        </table>
    </div>
</div>


       
 @endsection