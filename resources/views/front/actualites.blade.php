@extends('layouts.master')

@section('content')

    @forelse($posts as $post)

        <div class="post">

            @if($post->url_thumbnail)
            <img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="">
            @endif

            <a href="{{ action('FrontController@actualite', $post->id)}}">
                <h3>{{ $post->title }}</h3>
            </a>
            <div>
                <span>{{ $post->date }}</span>
            </div>
            <p>{{ $post->abstract }}</p>

            <a href="{{ action('FrontController@actualite', $post->id)}}">Lire la suite</a>
        </div>
        @empty
        Aucun article

    @endforelse

    {!! $posts->render() !!}

@endsection