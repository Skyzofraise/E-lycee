@extends('layouts.master')

@section('content')
    @if(!empty($posts))
    <section id="articles" class="flex">
        @forelse($posts as $post)
        <article class="posts">
            <div class="posts-image">
                @if(!empty($post->url_thumbnail))
                <img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="">
                @endif
            </div>
            <div class="infos flex-col">
                <div class="infos flex">
                    <div class="posts-date">
                        <span class="post_date_month">{{ date('d/m', strtotime($post->date)) }}</span>
                        <span class="post_year">{{ date('Y', strtotime($post->date)) }}</span>
                    </div>
                    <div class="posts-heading flex-col">
                        <h4 class="posts-title">
                            <a href="{{ url('actualite', [$post->id]) }}">{{$post->title}}</a>
                        </h4>
                    </div>
                </div>
                <div class="posts-resume">
                    {{ $post->abstract }}
                </div>
                <div class="posts-author">
                    <p>
                        <span>
                        @if($post->user)
                            <a href="{{ url('user', [$post->user->id]) }}">{{$post->user->username}}</a>
                        @else
                            {{'Anonyme'}}
                        @endif
                        </span> - 
                        <span><i class="fa fa-comments"></i> {{count($post->comments)}} commentaires</span>
                    </p>
                </div>
                <div class="posts-readmore">
                    <a href="{{ url('actualite', [$post->id]) }}">Lire la suite</a>
                </div>
            </div>
        </article>
            
        @empty
        Aucun article

        @endforelse
    </section>
    @else
        <p>Il n'y a aucun article pour le moment. Mais cela ne saurait tarder.</p>
    @endif

    {!! $posts->render() !!}

@endsection