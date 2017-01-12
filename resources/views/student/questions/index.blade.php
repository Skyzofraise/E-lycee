@extends('layouts.student-back')


@section('content')
    
    @if( Session::get('message') )
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h2>QCMs</h2>
    
    <h3>QCMs à faire</h3>
    @if( $number_questions == 0 )
        <div class="alert alert-info" role="alert">
            Vous n'avez pas de QCM à faire
        </div>
    @else
    <table class="table">
        <tr>
            <th>Titre</th>
            <th>Professeur</th>
            <th>Date</th>
            <th class="btn-edit-delete"></th>
        </tr>
        
        @foreach($questions_new as $question)
        <tr>
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
            <td>
                <form action="{{ url('qcm', [$question->id]) }}" method="get">
                    <button class="btn btn-primary btn-sm" role="button">Répondre</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
        
    <h3>QCMs faits<h3>
    <table class="table">
        @foreach($questions_anc as $question)
        <tr>
            {{-- <td class="element-status">
                <span class="label label-success"> </span>
            </td> --}}
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