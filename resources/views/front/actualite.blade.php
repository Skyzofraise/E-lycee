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
			Laisser un commentaires
		</h3>
		<form action="" method="post" id="respondform" class="respond-form">
			<p class="respond-message">
				<textarea placeholder="Message *" name="comment" required="required"></textarea>
			</p>
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
		</form>
	</div>
</section>

@endsection

@section('sidebar')
@endsection