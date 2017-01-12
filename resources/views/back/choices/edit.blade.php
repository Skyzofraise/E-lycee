@extends('layouts.back')


@section('content')

    @if( Session::get('message') )
    <div class="alert alert-danger" role="alert">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <span class="sr-only">Error:</span>
        {{Session::get('message')}}
        {{Session::get('erreur')}}
    </div>
    @endif

    <h1>Les choix à la question "{{ $question->content }}" </h1>
    
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

        {!! BootForm::submit('Je valide !') !!}

    {!! BootForm::close() !!}


@endsection