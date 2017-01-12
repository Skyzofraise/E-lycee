@extends('layouts.student-back')


@section('content')

    {{Session::get('erreur')}}

    <div class="page-header">
        <h2>{{ $question->content }}</h2>
    </div>
    

    {!! BootForm::open()->post()->route( 'StudentController@validation', $question )->enctype('multipart/form-data') !!}

        {{ csrf_field() }}
        
        @foreach($choices as $index => $choice)

            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="panel-title">Réponse : {{ $choice->content }}</p>
                </div>
                <div class="panel-body">
                    <label for="" class="radio-inline">
                        {!! BootForm::radio('Oui', 'status['. $choice->id .']', 'yes') !!}
                    </label>
                    <label for="" class="radio-inline">
                        {!! BootForm::radio('Non', 'status['. $choice->id .']', 'no') !!}
                    </label>
                </div>
            </div>

        @endforeach

        
        {!! BootForm::submit('Je valide !')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}

@endsection