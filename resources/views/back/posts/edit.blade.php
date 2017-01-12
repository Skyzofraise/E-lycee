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
        <h2>Editer l'article : "{{ $post->title }}"</h2>
    </div>
    
    {!! BootForm::open()->put()->action( route('posts.update', $post) )->enctype('multipart/form-data') !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre <span class="text-danger">*</span>', 'title')->value($post->title) !!}
        {!! BootForm::text('Résumé', 'abstract')->value($post->abstract) !!}
        {!! BootForm::textarea('Contenu <span class="text-danger">*</span>', 'content')->value($post->content) !!}
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

        {!! BootForm::submit('Editer')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}

@endsection