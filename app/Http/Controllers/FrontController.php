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
		$posts = Post::all();
		return view('front.home', compact('posts'));
	}

}