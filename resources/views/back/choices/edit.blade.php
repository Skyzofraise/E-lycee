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
        <h2>Les choix à la question "{{ $question->content }}" </h2>
    </div>
    
    {!! BootForm::open()->post()->route( 'QuestionController@ChoiceUpdate', $question ) !!}
        {{ method_field('PUT')}}
        {{ csrf_field()}}
        
        @foreach($question->choices as $index => $choice)
            {!! BootForm::hidden('id[]')->value($choice->id) !!}

            {!! BootForm::text('Choix '. strtolower($index+1), 'content[]')->value( $choice->content ) !!}

            {!! BootForm::hidden('status['. $index .']')->value('0') !!}

           <!--  @if($choice->status == 'yes') 
                {!! BootForm::checkbox('Bonne réponse', '1')->checkbox('terms')->checked('checked') !!}
            @else 
                {!! BootForm::checkbox('Bonne réponse', '0')->checkbox('terms') !!}
            @endif -->

            <div class="form-group">
                <label for="status[{{ $index }}]">Bonne réponse</label>
                <input type="checkbox" id="yes-{{$index}}" name="status[{{ $index }}]" value="1" @if($choice->status == 'yes') checked @endif>
            </div>
                 
        @endforeach

        {!! BootForm::submit('Je valide !')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}


@endsection