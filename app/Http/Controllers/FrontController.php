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

	// public function userPost($id) {
	// 	$user = User::find($id);
	// $name = $user->name;
	// 	$posts = $user->posts;

	// 	return view('front.user', compact('name', 'posts'));
	// }
	// public function PostByTag($id) {
	// 	$tag = Tag::find($id);
	// $name = $tag->name;
	// 	$posts = $tag->posts;

	// 	return view('front.tag', compact('name', 'posts'));
	// }

	// public function single($id) {
	// 	$post = Post::find($id);
	// 	return view('single', ['post'=> $post]);
	// }
	// public function student($id) {
	// 	$student = Student::find($id);
	// 	return view('student', ['student'=> $student]);
	// }
	// public function user($id) {
	// 	$user = User::find($id);
	// 	return view('user', ['user'=> $user]);
	// }

    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     return view('front.show', ['post' => $post]);
    // }
    // public function showStudent($id)
    // {
    //     $student = Student::find($id);
    //     return view('front.student.show', compact('student'));
    // }
    // public function showPostByCat($id)
    // {
    //     $category = Category::find($id);
    //     $title = $category->title;
    //     $posts = $category->posts;
    //     return view('category', [
    //         'title' => $title,
    //         'posts' => $posts
    //     ]);
    // }

}