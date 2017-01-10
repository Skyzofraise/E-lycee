@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Créer un nouvel article</h1>
    
    {!! BootForm::open()->post()->action( route('posts.store') ) !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre', 'title') !!}
        {!! BootForm::text('Résumé', 'abstract') !!}
        {!! BootForm::textarea('Contenu', 'content') !!}
        {!! BootForm::file('Image', 'url_thumbnail') !!}

        <!-- {!! BootForm::hidden('date')->value('2016-12-19 06:41:36') !!} -->

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::submit('Créer') !!}

    {!! BootForm::close() !!}

@endsection