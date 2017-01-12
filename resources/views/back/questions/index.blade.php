@extends('layouts.back')


@section('content')
    
    @if( Session::get('message') )
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h2>QCMs</h2>

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
            <th>Professeur</th>
            <th>Date</th>
            <th class="btn-edit-delete">Modifier</th>
            <th class="btn-edit-delete">Supprimer</th>
        </tr>
        
        @foreach($questions as $question)
        <tr>
            <td><input type="checkbox"></td>

            <td class="element-status">
                @if( $question->status == 'published' )
                    <span class="label label-success"> </span>
                @elseif( $question->status == 'unpublished' )
                    <span class="label label-warning"> </span>
                @endif                
            </td>

            <td><a href="{{ route('questions.edit', $question) }}">{{ $question->title }}</a></td>
            <td>
                @if( $question->class_level == 'final_class')
                    Terminale S
                @else
                    Première S
                @endif
            </td>
            <td>
                @if($question->user)
                    <a href="">{{$question->user->username}}</a>
                @else
                    {{'Anonyme'}}
                @endif
            </td>
            <td>
                {{ date('d/m/Y', strtotime($question->created_at)) }}
            </td>
            <td>
                <form action="{{ route('questions.edit', $question) }}" method="get">
                    <button class="btn btn-primary btn-sm" role="button">Modifier</button>
                </form>
            </td>
            <td>
                <form action="{{ route('questions.destroy', $question) }}" method='delete'>
                    {{method_field('DELETE')}}
                    <!-- {{csrf_field()}} -->
                    <button class="btn btn-danger btn-sm" role="button">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection