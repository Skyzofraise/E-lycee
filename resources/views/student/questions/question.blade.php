@extends('layouts.student-back')


@section('content')

    <h3>Formulaire</h3>

    {{Session::get('erreur')}}

    <h2>{{ $question->content }}</h2>

    {!! BootForm::open()->post()->route( 'StudentController@validation', $question )->enctype('multipart/form-data') !!}

        {{ csrf_field() }}
        
        @foreach($choices as $index => $choice)

            <h3>{{ $choice->content }}</h3>

            {!! BootForm::radio('Oui', 'status['. $choice->id .']', 'yes') !!}
            {!! BootForm::radio('Non', 'status['. $choice->id .']', 'no') !!}

        @endforeach

        {!! BootForm::submit('Je valide !') !!}

    {!! BootForm::close() !!}

@endsection