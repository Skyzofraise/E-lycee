<?php

namespace App\Http\Controllers;

use Gate;
use App\Tag;
use App\User;
use App\Post;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['except'=>['index']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);

        $this->authorize('show-post', $post);

        return view('admin.post.show', compact('post'));
    }
}
