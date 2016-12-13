@extends('layouts.master')

@section('content')

<div class="single">

    @if($post->url_thumbnail)
    <img src="{{ url('uploads/'.$post->id.'/'.$post->url_thumbnail) }}" alt="" class="img-responsive">
    @endif

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <div class="stats">
        <span class="user"><span class="userico"></span>{{ $post->user->username }}</span>
        <span class="user"><span class="dateico"></span>{{ $post->date }}</span>
        <span class="user"><span class="commentaireico"></span>{{count($post->comments)}}</span>
        <span class="date"><span class="dateico"></span>{{ $post->date }}</span>
    </div>
    
    <!-- <div class="comments">
        @if (empty ($comment) )
        <h3>Commentaires</h3>
        @foreach($post->comments as $comment)
        <div class="comment">
            <p class="commentext">{{ $comment->content }}</p>
        </div>
        <div class="stats comentaire" style="border:none;margin-bottom:30px;padding-top:0;margin-top:10px;">
            <span class="user"><span class="userico"></span> {{ $comment->user->username }}</span>
            <span class="date"><span class="dateico"></span>{{ $comment->created_at }}</span>
        </div>
        @endforeach
            @forelse($post->comments as $comment)
                @empty
                <div class="clear"></div>
                <p style="margin-bottom:30px;">Aucun article</p>
            @endforelse
        @endif
        <div>
            <form action="{{ action('CommentController@store') }}" method="post" style="margin-top:-30px;">
               {{ csrf_field() }}
                <label for="content"><h3>Poster un commentaire</h3></label>
                <div class="clear"></div>
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="content" id="content" class="textcomm" placeholder="Votre Commentaire"></textarea>
                <button class="btncomm">Envoyer</button>
            </form>
        </div>
    </div> -->
</div>

@endsection