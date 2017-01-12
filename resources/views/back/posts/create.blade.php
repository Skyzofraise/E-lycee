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
        <h2>Créer un nouvel article</h2>
    </div>
    
    
    {!! BootForm::open()->post()->action( route('posts.store') )->enctype('multipart/form-data') !!}

        {{ csrf_field()}}

        {!! BootForm::text('Titre <span class="text-danger">*</span>', 'title') !!}
        
        {!! BootForm::text('Résumé', 'abstract') !!}
        {!! BootForm::textarea('Contenu <span class="text-danger">*</span>', 'content') !!}
        <!-- {!! BootForm::file('Image', 'url_thumbnail') !!} -->
        <div class="form-group">
            <label class="control-label" for="url_thumbnail">Image</label>
            <input type="file" name="url_thumbnail" id="url_thumbnail">
        </div>

        {!! BootForm::select('Statut', 'status')
            ->options(['published' => 'Publié', 'unpublished' => 'Hors ligne'])
            ->select('unpublished') 
        !!}

        {!! BootForm::submit('Créer')->class('btn btn-primary btn-lg') !!}

    {!! BootForm::close() !!}

@endsection