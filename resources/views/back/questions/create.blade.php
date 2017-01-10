@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Créer un nouveau QCM</h1>
    
    {!! BootForm::open()->post()->action( route('questions.store') ) !!}

        {!! BootForm::text('Titre', 'title') !!}

        {!! BootForm::select('Niveau de class', 'class_level')
            ->options(['final_class' => 'Terminale', 'first_class' => 'Premiere'])
            ->select('first_class') !!}

        {!! BootForm::textarea('Contenu', 'content') !!}

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::text('Nombre de choix', 'numberChoice')->type('number')->min('2') !!}

        {!! BootForm::submit('Créer') !!}

    {!! BootForm::close() !!}

@endsection