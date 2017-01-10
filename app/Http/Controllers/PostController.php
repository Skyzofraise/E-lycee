<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Comment;
use Auth;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('date', 'DESC')->get();
        
        return view('back.posts.index', compact('posts'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts|max:200',
            'user_id' => 'integer',
            'content' => 'required',
            'status' => 'in:published,unpublished',
        ]);

        $post = Post::create($request->all());

        $post->user_id = Auth::user()->id;
        // $post->content = $request->post('content');
        // $post->date = now();


        if (!empty($request->file('url_thumbnail'))) {
            $image = $request->file('url_thumbnail');
            $extension = $image->getClientOriginalExtension();
            $uri = str_random(50) . '.' . $extension;
            $image->move('uploads' . DIRECTORY_SEPARATOR . $post->id, $uri);
            $post->url_thumbnail = $uri;
        }
        $post->touch();

        return redirect()->action('PostController@index')->with('message', 'Article enregistré avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::findOrFail($id);
        
        return view('back.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        
        return redirect()->action('PostController@index', $post)->with('messages', 'L\'article a bien été modifiée');
    }
}
