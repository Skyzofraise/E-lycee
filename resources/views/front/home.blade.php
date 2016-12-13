@extends('layouts.master')

@section('content')
    @if(!empty($posts))
        <section id="articles" class="flex">
            @foreach($posts as $post)
            <article class="posts">
                <div class="posts-image">
                    @if(!empty($post->url_thumbnail))
                    <img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="">
                    @endif
                </div>
                <div class="infos flex-col">
                    <div class="infos flex">
                        <div class="posts-date">{{ $post->date }}</div>
                        <div class="posts-heading flex-col">
                            <h2 class="posts-title">
                                <a href="{{url('post', [$post->id])}}">{{$post->title}}</a>
                            </h2>
                            <span class="posts-auteur">
                                <a href="">Quelqu'un</a>
                            </span>

                            <!-- -->
                            <!-- AJOUTER AUTEUR/USER -->
                            <!-- -->

                        </div>
                    </div>
                    <div class="posts-resume">
                        {{ $post->abstract }}
                    </div>
                    <div class="posts-readmore">
                        <a href="{{ action('FrontController@actualite', $post->id)}}">Lire la suite</a>
                    </div>
                </div>
            </article>
            @endforeach
        </section>
    @else
        <p>Il n'y a aucun article pour le moment. Mais cela ne saurait tarder.</p>
    @endif
@endsection

@section('sidebar')
    @parent
    <div>
        Ici c'est la home page
    </div>

@endsection