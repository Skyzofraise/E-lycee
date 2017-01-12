<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;

use Illuminate\Http\Request;
use App\Http\Requests;

class FrontController extends Controller
{

	public function index() 
	{
		$posts = Post::orderBy('date', 'desc')
                ->where('status', 'published')
                ->take(3)
                ->get();

        $autres_posts = $this->random_post();

		return view('front.home', compact('posts','autres_posts'));
	}

    public function actualites(Request $request)
    {

        $posts = Post::where(function($query) use ($request){
                if(($term = $request->get('term'))){
                    $query->orwhere('title', 'like', '%' . $term . '%');
                    $query->orwhere('content', 'like', '%' . $term . '%');
                }
            })
            ->where('status', 'published')
            ->orderBy("date", "desc")
            ->paginate(10);

        $autres_posts = $this->random_post();

        return view('front.actualites', compact('posts','autres_posts'));
    }

    public function actualite($id)
    {
    	$post = Post::findOrFail($id);
        $autres_posts = $this->random_post();

    	return view('front.actualite', compact('post','autres_posts'));
    }

    public function lycee()
    {
        return view('front.lycee');
    }

    public function mentions()
    {
        return view('front.mentions');
    }

    public function contact()
    {

        $autres_posts = $this->random_post();

        return view('front.contact', compact('posts','autres_posts'));
    }

    private function random_post()
    {
        return Post::where('status', 'published')
            ->inRandomOrder()
            ->take(3)
            ->get();
    }

}