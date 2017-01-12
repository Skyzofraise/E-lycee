<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Question;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use App\Http\Requests;

class BackController extends Controller
{
 
    public function index()
    {
        $posts = Post::orderBy('date', 'DESC')->take(3)->get();
        $questions = Question::orderBy('created_at', 'DESC')->take(3)->get();

        $users = User::where('role', 'first_class')->orWhere('role', 'final_class')->orderBy('id', 'DESC')->take(3)->get();
        $stat_users = User::where('role', 'first_class')->orWhere('role', 'final_class')->count();
        $stat_articles = Post::where('status','published')->count();
        $stat_qcm = Question::all()->count();
        $stat_comments = Comment::all()->count();

        return view('back.dashboard', compact('posts', 'questions', 'users', 'stat_users', 'stat_articles', 'stat_qcm', 'stat_comments'));
    }



}
