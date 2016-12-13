@extends('layouts.master')

@section('content')

<div>

    @if($post->url_thumbnail)
    <img src="{{ url('images/'.$post->url_thumbnail) }}" alt="">
    @endif

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <div class="stats">
        <span>{{ $post->user->username }}</span>
        <span>{{ $post->date }}</span>
    </div>
</div>

@endsection
@section('sidebar')
@endsection