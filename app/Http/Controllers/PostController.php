<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Comment;
use Auth;
use Storage;

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
            // 'title' => array(
            //     'required' => 'Ce champs est obligatoire',
            //     'unique:posts' => 'Ce titre est déjà utilisé',
            //     'max:200' => '200 caractères maximum',
            // ),
            'user_id' => 'integer',
            'content' => 'required',
            'status' => 'in:published,unpublished',
        ]);

        $post = Post::create($request->all());

        $post->user_id = Auth::user()->id;

        if (!empty($request->file('url_thumbnail'))) {
            $image = $request->file('url_thumbnail');
            $extension = $image->getClientOriginalExtension();
            $uri = str_random(30) . '.' . $extension;
            $upload = public_path('images/posts');
            $image->move($upload, $uri);
            $post->url_thumbnail = $uri;
        }
        $post->touch();

        return redirect()->action('PostController@index')->with('message', 'Actualité enregistré avec succès !');
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
        $this->validate($request, [
            'title' => 'required|max:200',
            'content' => 'required',
            'status' => 'in:published,unpublished',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        if (!empty($request->file('url_thumbnail'))) {

            $upload = public_path('images/posts');

            // -- Supprimer l'ancienne image
            // if (!empty($post->url_thumbnail)) {
            //     $ancienne = $post->url_thumbnail;
            //     Storage::delete($upload . '/' . $ancienne); 
            // }

            $image = $request->file('url_thumbnail');
            $extension = $image->getClientOriginalExtension();
            $uri = str_random(30) . '.' . $extension;
            $image->move($upload, $uri);
            $post->url_thumbnail = $uri;
        }
        $post->touch();
        
        return redirect()->action('PostController@index', $post)->with('messages', 'L\'actualité a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return back()->with('message', 'Cette actualité a bien été supprimée');
    }
}
