@extends('layouts.master')

@section('content')

<h3 class="actualite-title">
	{{ $post->title }}
</h3>

<p class="post-informations">
	<span class="post-date">
		{{ date('d/m/Y', strtotime($post->date)) }}
	</span>
	<span class="post-author">
		par 
	    @if($post->user)
	    	<a href="{{ url('user', [$post->user->id]) }}">{{$post->user->username}}</a>
	    @else
	        {{'Anonyme'}}
	    @endif
	</span>
</p>

<article class="actualite-content">

    @if($post->url_thumbnail)
    <div class="image-article">
    	<img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="" title="{{ $post->title }}">
    </div>
    @endif

    <p>{{ $post->content }}</p>

</article>

<section id="commentaire">
	<div id="respond">
		<h4>Laisser un commentaire </h4>
		<form action="" method="post" id="respondform" class="respond-form">
			<div class="flex">
				<div class="form-left flex-col">
					<input placeholder="Nom *" name="author" type="text" value="" required="required">
					<input placeholder="Email *" name="email" type="text" value="" required="required">
					<input placeholder="Website" name="url" type="text" value="">
				</div>
				<div class="form-right">
					<textarea placeholder="Message *" name="comment" required="required"></textarea>
				</div>
			</div>
			<p class="form-submit">
				<input name="submit" type="submit" class="submit" value="Commenter">
				<input type="hidden" name="respond_post_ID" value="{{ $post->id }}" id="comment_post_ID">
			</p>
		</form>
	</div>
	<div id="comments">
	@if (!empty($post->comments))
		<h4>Commentaires</h4>

	    @forelse($post->comments as $comment)
		<div class="comment">
	        <p class="comment-texte">{{ $comment->content }}</p>
		    <div class="stats" style="border:none;margin-bottom:30px;padding-top:0;margin-top:10px;">
		        <span class="auteur">
                    @if($comment->user)
                        <a href="{{ url('user', [$comment->user->id]) }}">{{ $comment->user->username }}</a>
                    @else
                        {{'Anonyme'}}
                    @endif
		        </span>
		        <span class="date">
		        	{{ $comment->created_at }}
		        </span>
		    </div>
	    </div>          
        @empty
        <p>Aucun commentaire</p>
        @endforelse

    @else
        <p>Aucun commentaire</p>
    @endif
    </div>
</section>

@endsection
