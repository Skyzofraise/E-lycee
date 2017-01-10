@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Editer l'article : "{{ $post->title }}"</h1>
    
    {!! BootForm::open()->post()->action( route('posts.update', $post) ) !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre', 'title')->value($post->title) !!}
        {!! BootForm::text('Résumé', 'abstract')->value($post->abstract) !!}
        {!! BootForm::textarea('Contenu', 'content')->value($post->content) !!}
        {!! BootForm::file('Image', 'url_thumbnail') !!}

        <!-- {!! BootForm::hidden('date')->value('2016-12-19 06:41:36') !!} -->

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::submit('Editer') !!}

    {!! BootForm::close() !!}

@endsection