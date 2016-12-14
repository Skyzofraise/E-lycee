@extends('layouts.master')

@section('content')

<article>
    @if($post->url_thumbnail)
    <img src="{{ url('images/posts', [$post->url_thumbnail]) }}" alt="">
    @endif

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>

    <div class="stats">
    	<span>
        @if($post->user)
        	{{ $post->user->username }}
        @else
            {{'Anonyme'}}
        @endif
        </span>
        <span>{{ $post->date }}</span>
    </div>
</article>
<section id="commentaire">
	<div id="respond">
		<h3 class="respond-titre">
			Laisse un commentaire
		</h3>
		<form action="" method="post" id="respondform" class="respond-form flex">
			<div class="form-left flex-col">
				<p class="respond-nom">
					<input placeholder="Nom *" name="author" type="text" value="" required="required">
				</p>
				<p class="respond-email">
					<input placeholder="Email *" name="email" type="text" value="" required="required">
				</p>
				<p class="respond-url">
					<input placeholder="Website" name="url" type="text" value="">
				</p>
				<p class="respond-submit">
					<input name="submit" type="submit" class="submit" value="Commenter">
					<input type="hidden" name="respond_post_ID" value="{{ $post->id }}" id="comment_post_ID">
				</p>
			</div>
			<div class="form-right">
				<p class="respond-message">
					<textarea placeholder="Message *" name="comment" required="required"></textarea>
				</p>
			</div>
		</form>
	</div>
	<div id="comments">
	@if (!empty($post->comments))
		<h3 class="comments-titre">
			Commentaires
		</h3>

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
