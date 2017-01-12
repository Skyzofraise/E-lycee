@extends('layouts.back')


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

    <h1>Créer un nouveau QCM</h1>
    
    {!! BootForm::open()->post()->action( route('questions.store') ) !!}

        {!! BootForm::text('Titre', 'title') !!}

        {!! BootForm::select('Niveau de class', 'class_level')
            ->options(['final_class' => 'Terminale S', 'first_class' => 'Premiere S'])
            ->select('premiere') !!}

        {!! BootForm::textarea('Contenu', 'content') !!}

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::text('Nombre de choix', 'numberChoice')->type('number')->min('2')->value('2') !!}

        {!! BootForm::submit('Créer')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}

@endsection