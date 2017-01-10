@extends('layouts.back')


@section('content')
    <h1>Créer les choix à la question "{{ $question->content }}" </h1>
    {!! BootForm::open()->post()->route( 'QuestionController@ChoiceUpdate', $question ) !!}
        {{ method_field('PUT')}}
        {{ csrf_field()}}
        
        @foreach($question->choices as $index => $choice)
            {!! BootForm::hidden('id[]')->value($choice->id) !!}

            {!! BootForm::text('Choix '. strtolower($index+1), 'content[]')->value( $choice->content ) !!}

            {!! BootForm::hidden('status['. $index .']')->value('0') !!}

            <!-- {!! BootForm::checkbox('Bonne réponse', 'status['. $index .']')
                ->checkbox('terms')->checked()
            !!} -->
            <div class="form-group">
                <label for="status[{{ $index }}]">Banana réponse</label>
                <input type="checkbox" id="yes-{{$index}}" name="status[{{ $index }}]" value="1" @if($choice->status == 'yes') checked @endif>
            </div>   
                 
        @endforeach

        {!! BootForm::submit('Je valide !') !!}

    {!! BootForm::close() !!}


@endsection