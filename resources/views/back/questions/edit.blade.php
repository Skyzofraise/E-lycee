@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Modifier le QCM : {{ $question->title }}</h1>

    {!! BootForm::open()->put()->action( route('questions.update', $question) ) !!}

        {!! BootForm::text('Titre', 'title')->value($question->title) !!}

        {!! BootForm::select('Niveau de class', 'class_level')
            ->options(['final_class' => 'Terminale', 'first_class' => 'Premiere'])
            ->select($question->class_level) !!}

        {!! BootForm::textarea('Contenu', 'content')->value($question->content) !!}

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Brouillon'])
            ->select('$question->status') 
        !!}

        {!! BootForm::submit('Modifier') !!}

    {!! BootForm::close() !!}

@endsection