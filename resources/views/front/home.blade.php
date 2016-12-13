@extends('layouts.master')

@section('content')
    @if(!empty($posts))
        <div>
            @foreach($posts as $post)
            <article>
                @if(!empty($post->url_thumbnail))
                <img src="{{ url('images', [$post->url_thumbnail]) }}" alt="">
                @endif
                <div class="infos">
                    <h3><a href="{{url('post', [$post->id])}}">{{$post->title}}</a></h3>
                    <span>{{ $post->date }}</span>
                    <p>{{ $post->abstract }}</p>

                    <a href="{{ action('FrontController@actualite', $post->id)}}">Lire la suite</a>
                </div>
            </article>
            @endforeach
        </div>
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