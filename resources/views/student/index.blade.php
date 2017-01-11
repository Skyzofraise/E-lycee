@extends('layouts.back')


@section('content')
    
    
    {{Session::get('message')}}
    
    <h2>Étudiants</h2>

    <div class="row">
        <div class="col-md-12 back-statistiques">
            @if( $qcm_restant != 0 )
                Il y a {{ $qcm_restant }} nouveaux QCM
            @else
                Aucun nouveau QCM
            @endif
            <div class="panel panel-info">
                <div class="panel-heading">
                    <span><b>Mes statistiques</b></span>
                </div>
                <div class="panel-body">
                    <div class="col-md-3"><i class="fa fa-comment" aria-hidden="true"></i> 
                        Votre score est de xx sur xx
                    </div>
                    <div class="col-md-3"><i class="fa fa-file-text-o" aria-hidden="true"></i>
                        {{ $qcm_count }} QCM
                    </div>
                </div>
            </div>        
        </div>
    </div>

@endsection