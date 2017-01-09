@extends('layouts.back')


@section('content')

    <h1>Créer un nouveau QCM</h1>
    {!! BootForm::open()->post()->action( route('questions.store') ) !!}

        {!! BootForm::text('Titre', 'title') !!}

        {!! BootForm::select('Niveau de class', 'class_level')
            ->options(['terminale' => 'Terminale', 'premiere' => 'Premiere'])
            ->select('premiere') !!}

        {!! BootForm::textarea('Contenu', 'content') !!}

        {!! BootForm::select('Statut', 'status')
            ->options(['publish' => 'Publié', 'unpublish' => 'Brouillon'])
            ->select('unpublish') 
        !!}

        {!! BootForm::text('Nombre de choix', 'numberChoice')->type('number')->min('2') !!}

        {!! BootForm::submit('Créer') !!}

    {!! BootForm::close() !!}

@endsection