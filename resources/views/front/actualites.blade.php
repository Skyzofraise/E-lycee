@extends('layouts.master')

@section('content')
    @if(!empty($posts))
    <h3>Actualités</h3>
    <section id="articles" class="actualites flex">
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
                        <h4>
                            <a href="{{ url('actualite', [$post->id]) }}">{{ str_limit($post->title, 40) }}</a>
                        </h4>
                    </div>
                </div>
                <div class="posts-resume">
                    {{ str_limit($post->abstract, 100) }}
                </div>
                <div class="posts-author">
                    <p>
                    Par  
                        <span>
                        @if($post->user)
                            <a href="#">{{$post->user->username}}</a>
                        @else
                            {{'Anonyme'}}
                        @endif
                        </span> | 
                        <span>{{count($post->comments)}} <i class="fa fa-comment"></i></span>
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