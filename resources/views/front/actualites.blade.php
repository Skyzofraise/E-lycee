@extends('layouts.master')

@section('content')

    @forelse($posts as $post)

        <div class="post">
            <a href="{{ action('FrontController@actualite', $post->id)}}">
                <h3>{{ $post->title }}</h3>
            </a>

            @if($post->url_thumbnail)
            <img src="{{ url('images', [$post->url_thumbnail]) }}" alt="">
            @endif

            <a href="{{ action('FrontController@actualite', $post->id)}}">
                <h3>{{ $post->title }}</h3>
            </a>
            <p>{{ $post->abstract }}</p>
            <a href="{{ action('FrontController@actualite', $post->id)}}">Lire la suite</a>

            <div>
                <span>{{ $post->date }}</span>
                <span>{{ $post->date }}</span>
            </div>
        </div>
        @empty
        Aucun article

    @endforelse

    {!! $posts->render() !!}

@endsection