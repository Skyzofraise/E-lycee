@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <button class="btn btn-primary pull-right ctt-ajout">
        <a href="{{ route('questions.create') }}" class="ajouter">Ajouter</a>
    </button>
    <table class="table">
        <tr>
            <th>Titre</th>
            <th>Niveau de class</th>
            <th>Status</th>
            <th>Editer</th>
            <th>Supprimer</th>
        </tr>
        
        @foreach($questions as $question)
        <tr>
            <td><a href="{{ route('questions.edit', $question) }}">{{ $question->title }}</a></td>
            <td>{{ $question->class_level }}</a></td>
            <td>{{ $question->status }}</td>
            <td>
                <form action="{{ route('questions.edit', $question) }}" method="get">
                    <button>Editer</button>
                </form>
            </td>
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