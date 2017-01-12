@extends('layouts.student-back')


@section('content')

    <h3>Formulaire</h3>

    {{Session::get('erreur')}}

    <h2>{{ $question->content }}</h2>

    {!! BootForm::open()->post()->route( 'StudentController@validation', $question )->enctype('multipart/form-data') !!}
    <!-- {!! BootForm::open()->post()->route( 'QuestionController@ChoiceUpdate', $question ) !!} -->
    <!-- {!! BootForm::open()->post()->action( route('questions.store') ) !!} -->

        {{ csrf_field() }}

        <!-- {!! BootForm::hidden('question_id')->value($question->id) !!} -->
        
        @foreach($choices as $index => $choice)

            <h3>{{ $choice->content }}</h3>

            {!! BootForm::radio('Oui', 'status['. $choice->id .']', 'yes') !!}
            {!! BootForm::radio('Non', 'status['. $choice->id .']', 'no') !!}

        @endforeach

        {!! BootForm::submit('Je valide !') !!}

    {!! BootForm::close() !!}

@endsection