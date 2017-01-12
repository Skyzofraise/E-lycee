@extends('layouts.back')


@section('content')

    <h2>{{ $question->content }}</h2>

    {!! BootForm::open()->post()->route( 'StudentController@validation', $question->id ) !!}

        {{ csrf_field() }}

        {!! BootForm::hidden('question_id')->value($question->id) !!}
        
        <table class="table">
        @foreach($choices as $index => $choice)
            <tr>
                <td class="article-status">
                    {!! BootForm::checkbox('', 'status['. $choice->id .']') !!}
                </td>
                <td class="article-status">
                    {{ $choice->content }}
                </td>
            </tr>
            <!-- <h3>{{ $choice->content }}</h3><!-- 
            {!! BootForm::radio('Oui', 'status['. $choice->id .']', 'yes') !!}
            {!! BootForm::radio('Non', 'status['. $choice->id .']', 'no') !!} -->

        @endforeach
        </table>

        {!! BootForm::submit('Je valide !') !!}
    {!! BootForm::close() !!}

@endsection