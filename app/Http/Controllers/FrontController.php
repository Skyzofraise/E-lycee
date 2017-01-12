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

		return view('front.home', compact('posts'));
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

        $autres_posts = Post::where('status', 'published')
            ->take(3)
            ->paginate(10);

        return view('front.actualites', compact('posts','autres_posts'));
    }

    public function actualite($id)
    {
    	$post = Post::findOrFail($id);

    	return view('front.actualite', compact('post'));
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
        return view('front.contact');
    }

}