@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}

    <h2>Articles</h2>
    <p>
        <a href="" class="btn btn-success btn-sm" role="button">En ligne</a>
        <a href="" class="btn btn-warning btn-sm" role="button">Hors ligne</a>
        <a href="" class="btn btn-danger btn-sm" role="button">Supprimer</a>

        <a href="" class="ajouter btn btn-primary pull-right" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Ajouter</a>
    </p>
    
    <table class="table">
        <tr>
            <th><input type="checkbox"></th>
            <th class="center">Statut</th>

            <th>Titre</th>
            <th>Auteur</th>
            <th>Date</th>
            <th><i class="fa fa-comment" aria-hidden="true"></i></th>
            
            <th class="center">Modifier</th>
            <th class="center">Supprimer</th>
        </tr>
        
        @foreach($posts as $post)
        <tr>
            <td><input type="checkbox"></td>

            <td class="center article-status">
                @if( $post->status == 'published' )
                    <span class="label label-success"> </span>
                @elseif( $post->status == 'unpublished' )
                    <span class="label label-warning"> </span>
                @endif                
            </td>

            <td><a href="">{{ $post->title }}</a></td>
            <td>
                @if($post->user)
                    <a href="">{{$post->user->username}}</a>
                @else
                    {{'Anonyme'}}
                @endif
            </td>
            <td>{{ date('d/m/Y', strtotime($post->date)) }}</td>
            <td>{{ count($post->comments) }}</td>
            
            <td class="btn-edit-delete">
                <a href="" class="btn btn-primary btn-sm" role="button">Modifier</a>
            </td>
            <td class="btn-edit-delete">
               <form action="" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <a href="" class="btn btn-danger btn-sm" role="button">Supprimer</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection