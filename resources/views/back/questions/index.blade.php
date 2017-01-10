@extends('layouts.back')


@section('content')
    
    {{Session::get('message')}}

    <h2>Questions</h2>

    <p>
        <a href="" class="btn btn-success btn-sm" role="button">En ligne</a>
        <a href="" class="btn btn-warning btn-sm" role="button">Hors ligne</a>
        <a href="" class="btn btn-danger btn-sm" role="button">Supprimer</a>

        <a href="{{ route('questions.create') }}" class="ajouter btn btn-primary pull-right" role="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Ajouter</a>
    </p>
    
    <table class="table">
        <tr>
            <th><input type="checkbox"></th>
            <th>Status</th>
            <th>Titre</th>
            <th>Classe</th>
            <th>Supprimer</th>
        </tr>
        
        @foreach($questions as $question)
        <tr>
            <td><input type="checkbox"></td>

            <td class="center article-status">
                @if( $question->status == 'published' )
                    <span class="label label-success"> </span>
                @elseif( $question->status == 'unpublished' )
                    <span class="label label-warning"> </span>
                @endif                
            </td>

            <td><a href="{{ route('questions.edit', $question) }}">{{ $question->title }}</a></td>
            <td>{{ $question->class_level }}</a></td>
            
            <td>
               <form action="" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <button>Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection