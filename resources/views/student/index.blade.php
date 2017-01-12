@extends('layouts.student-back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <h2>Dashboard étudiant</h2>

    <div class="row">
        <div class="col-md-12 back-statistiques">
            @if( $qcm_restant != 0 )
                <div class="alert alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>

                        <a href="/qcm">Il y a {{ $qcm_restant }} nouveau(x) QCM</a>
                </div>
            @else
                {{-- Aucun nouveau QCM --}}
            @endif
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span><b>Mes statistiques</b></span>
                </div>
                <div class="panel-body">
                    

                    <div class="col-md-3"> 
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                        {{-- @if( $score >= moyenne)
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-meh-o" aria-hidden="true"></i>
                        @endif --}}

                        Votre score est de xx sur xx
                    </div>
                    <div class="col-md-3"><i class="fa fa-question-circle-o" aria-hidden="true"></i>
                        {{ $qcm_count }} QCM
                    </div>
                </div>
            </div>        
        </div>
    </div>

@endsection