<aside class="sidebar" class="flex-col">
    <section class="autres-articles flex-col">
    	<h3>A lire aussi</h3>
		@if(!empty($posts))

        @foreach($posts as $post)
        <article class="aside-posts">
            <ul class="article-list">
                <li>
                    <span> {{date('d/m/Y', strtotime($post->date))}} :</span>
                    <a href="{{ url('actualite', [$post->id]) }}">{{$post->title}}</a>
                </li>
            </ul>
        </article>
        @endforeach

    	@else
        <p>Nous n'avons pas d'autre article à vous présenter pour le moment.</p>
   		@endif
   	</section>

    <section class="twitter-mod flex-col">
        <center>
        	<div class="twitter">Twitter</div>
        </center>
   	</section>

</aside>
