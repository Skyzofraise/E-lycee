@extends('layouts.master')

@section('content')
    @if(!empty($posts))
        <div>
            <div>
        @foreach($posts as $post)
                <article>
                    @if(!empty($post->url_thumbnail))
                    <img src="{{ url('images', [$post->url_thumbnail]) }}" alt="">
                    @endif
                    <div class="infos">
                        <h3><a href="{{url('post', [$post->id])}}">{{$post->title}}</a></h3>
                        <p></p>
                    </div>
                </article>
        @endforeach
            </div>
        </div>
    @else
        <p>désolé aucun article</p>
    @endif
@endsection

@section('sidebar')
@parent
    @if(!empty($students))
        <div>
        </div>
    @else
        <p>désolé aucun étudiant</p>
    @endif
@endsection