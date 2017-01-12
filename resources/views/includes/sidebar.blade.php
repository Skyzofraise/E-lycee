<aside class="sidebar" class="flex-col">
    <section class="flex-col">
    	<h3><i class="fa fa-plus-circle" aria-hidden="true"></i> A lire aussi</h3>
		@if(!empty($autres_posts))

            @foreach($autres_posts as $post)
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

    <section class="flex-col">
    <h3><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</h3>
        <center>
            <a class="twitter-timeline" data-height="500" href="https://twitter.com/MMI_Troyes">Tweets by E-Lycée</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </center>
   	</section>

</aside>
