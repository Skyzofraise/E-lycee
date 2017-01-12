@extends('layouts.back')


@section('content')

    {{Session::get('message')}}

    <h1>Créer un nouvel article</h1>
    
    {!! BootForm::open()->post()->action( route('posts.store') )->enctype('multipart/form-data') !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre', 'title') !!}
        {!! BootForm::text('Résumé', 'abstract') !!}
        {!! BootForm::textarea('Contenu', 'content') !!}
        <!-- {!! BootForm::file('Image', 'url_thumbnail') !!} -->
        <div class="form-group">
            <label class="control-label" for="url_thumbnail">Image</label>
            <input type="file" name="url_thumbnail" id="url_thumbnail">
        </div>

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::submit('Créer') !!}

    {!! BootForm::close() !!}

@endsection