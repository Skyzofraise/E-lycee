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

    <div class="page-header">
        <h2>Modifier le QCM : {{ $question->title }}</h2>
    </div>

    {!! BootForm::open()->put()->action( route('questions.update', $question) ) !!}

        {!! BootForm::text('Titre <span class="text-danger">*</span>', 'title')->value($question->title) !!}

        {!! BootForm::select('Niveau de classe  <span class="text-danger">*</span>', 'class_level')
            ->options(['final_class' => 'Terminale', 'first_class' => 'Premiere'])
            ->select($question->class_level) !!}

        {!! BootForm::textarea('Contenu  <span class="text-danger">*</span>', 'content')->value($question->content) !!}

        @if($question->status == 'published')
            {!! BootForm::select('Statut', 'status')
                ->options(['published' => 'Publié', 'unpublished' => 'Brouillon'])
                ->select('published') 
            !!}
        @else 
            {!! BootForm::select('Statut <span class="text-danger">*</span>', 'status')
                ->options(['published' => 'Publié', 'unpublished' => 'Brouillon'])
                ->select('unpublished') 
            !!}
        @endif

        {!! BootForm::submit('Modifier')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}

@endsection