<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function login(Request $request)
    // {
    //     if($request->isMethod('post'))
    //     {
    //         $this->validate($request, [
    //             'username' => 'required',
    //             'password' => 'required'
    //         ]);

    //         // récupère un tableau associatif username password
    //         $credentials = $request->only('username', 'password');

    //         if(Auth::attempt($credentials))
    //         {
    //             // C'est ok, on a acces au routes protéger
    //             return redirect('admin/post')->with(['message'=>'success']);
    //         } else {
    //             return back()
    //                 ->withInput($request->only('username'))
    //                 ->with(['message'=> 'C\'est pas bon ça, mon coco !']);
    //         }
    //     }
    //     return view('front.mentions');
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect('/')->with(['message' =>'succes logout']);
    // }
}