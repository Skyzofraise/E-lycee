@extends('layouts.back')


@section('content')
    <h1>Créer les choix à la question "{{ $question->content }}" </h1>
    {!! BootForm::open()->post()->route( 'QuestionController@ChoiceUpdate', $question ) !!}
        {{ method_field('PUT')}}
        {{ csrf_field()}}
        
        @foreach($question->choices as $index => $choice)

            {!! BootForm::text('Choix '. strtolower($index+1), '') !!}
            {!! BootForm::hidden($choice->id)->name('id[]') !!}

            {!! BootForm::checkbox('Bonne réponse', '')->checkbox('terms') !!}
        
        @endforeach

        {!! BootForm::submit('Créer') !!}

    {!! BootForm::close() !!}


@endsection