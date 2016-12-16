<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use App\Http\Requests;

class BackController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}
 
    public function index()
    {
        $posts = Post::orderBy('date', 'DESC')->take(3)->get();
        $users = User::where('role', 'first_class')->orWhere('role', 'final_class')->orderBy('id', 'DESC')->take(3)->get();

        return view('back.dashboard', compact('posts', 'users'));
    }
}
