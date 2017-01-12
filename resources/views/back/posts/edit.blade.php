@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Editer l'article : "{{ $post->title }}"</h1>
    
    {!! BootForm::open()->put()->action( route('posts.update', $post) )->enctype('multipart/form-data') !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre', 'title')->value($post->title) !!}
        {!! BootForm::text('Résumé', 'abstract')->value($post->abstract) !!}
        {!! BootForm::textarea('Contenu', 'content')->value($post->content) !!}
        {!! BootForm::file('Image', 'url_thumbnail') !!}

        @if($post->status == 'published')
            {!! BootForm::select('Statut', 'status')
                ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
                ->select('published') 
            !!}
        @else 
            {!! BootForm::select('Statut', 'status')
                ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
                ->select('unpublished') 
            !!}
        @endif

        {!! BootForm::submit('Editer') !!}

    {!! BootForm::close() !!}

@endsection