@extends('layouts.student-back')


@section('content')
    
    @if( Session::get('message') )
        <div class="alert alert-success" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i> {{Session::get('message')}}
        </div>
    @endif

    @if( Session::get('erreur') )
        <div class="alert alert-danger" role="alert">
            <i class="fa fa-times" aria-hidden="true"></i> {{Session::get('erreur')}}
        </div>
    @endif
    
    <div class="page-header">
       <h2>QCMs</h2> 
    </div>
    

    <div class="row">
        <div class="col-md-12">
            Votre score est de : {{ $mon_score }}/{{ $total }}
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h3>QCMs à faire</h3>
            @if( $number_questions == 0 )
                <div class="alert alert-info" role="alert">
                    Vous n'avez pas de QCM à faire
                </div>
            @else
            <div class="table-responsive">
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
                            <form action="{{ url('qcm', [$question->id]) }}" method="get">
                                <button class="btn btn-primary btn-sm" role="button">Répondre</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @endif
        </div>
            
        <div class="col-md-6 col-sm-12">
            <h3>QCMs faits</h3>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Titre</th>
                        <th>Professeur</th>
                        <th>Date</th>
                        <th class="btn-edit-delete"></th>
                    </tr>
                    @foreach($questions_anc as $question)
                    <tr>
                        <td>{{ $question->title }}</td>
                        <td>
                            @if($question->user_id)
                                <a href="">{{$question->user->username}}</a>
                            @else
                                {{'Anonyme'}}
                            @endif
                        </td>
                        <td>
                            {{ date('d/m/Y', strtotime($question->created_at)) }}
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection