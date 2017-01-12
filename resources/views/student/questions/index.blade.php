@extends('layouts.back')


@section('content')
    
    @if( Session::get('message') )
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h2>QCMs</h2>
    
    <table class="table">
        <tr>
            <th>Status</th>
            <th></th>
            <th>Titre</th>
            <th>Professeur</th>
            <th>Date</th>
        </tr>
        
        @foreach($questions_new as $question)
        <tr>
            <td class="article-status">
                <span class="label label-warning"> </span>
            </td>
            <td>
                <form action="{{ url('qcm', [$question->id]) }}" method="get">
                    <button class="btn btn-primary btn-sm" role="button">Répondre</button>
                </form>
            </td>

            <td><a href="{{ url('qcm', [$question->id]) }}">{{ $question->title }}</a></td>
            <td>
                @if($question->user_id)
                    <a href="">{{$question->user_id->username}}</a>
                @else
                    {{'Anonyme'}}
                @endif
            </td>
            <td>
                {{ date('d/m/Y', strtotime($question->created_at)) }}
            </td>
        </tr>
        @endforeach
        
        @foreach($questions_anc as $question)
        <tr>
            <td class="article-status">
                <span class="label label-success"> </span>
            </td>
            <td>
                Fait
            </td>

            <td><a href="{{ url('qcm', [$question->id]) }}">{{ $question->title }}</a></td>
            <td>
                @if($question->user_id)
                    <a href="">{{$question->user_id->username}}</a>
                @else
                    {{'Anonyme'}}
                @endif
            </td>
            <td>
                {{ date('d/m/Y', strtotime($question->created_at)) }}
            </td>
        </tr>
        @endforeach
    </table>

@endsection