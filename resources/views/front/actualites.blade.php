@extends('layouts.master')

@section('content')

    @forelse($posts as $post)

        <article class="post">
            <!-- Post image -->
            <div class="post-thumbnail">
                @if($post->url_thumbnail)
                <img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="">
                @endif
            </div>
            <div class="post-content">
                <!-- Post Titre -->
                <h2>
                    <a href="{{ action('FrontController@actualite', $post->id)}}">{{ $post->title }}</a>
                </h2>

                <!-- Post auteur, date -->
                <div class="post-meta">
                    <a class="post-auteur" href="#">Margarita</a>
                    <a href=""><time datetime="">{{ $post->date }}</time></a>
                </div>

                <!-- Post resume -->
                <p class="description">{{ $post->abstract }}</p>

                <!-- Post bouton lire plus -->
                <a href="{{ action('FrontController@actualite', $post->id)}}" class="read-more">
                    Lire la suite
                </a>
            </div>
        </article>
        @empty
        Aucun article

    @endforelse

    {!! $posts->render() !!}

@endsection