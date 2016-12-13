<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::pattern('id', '[1-9][0-9]*'); // * 0, N
// Route::pattern('slug', '[a-zA-Z\-]+');   // + 1, N

Route::get('/', 'FrontController@index');
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

// Route::get('/post/{id}/{slug?}', 'FrontController@show');
// Route::get('/category/{id}/{slug?}', 'FrontController@showPostByCat');
// Route::get('/student/{id}', 'FrontController@showStudent');
// Route::get('/user/{id}', 'FrontController@showPostByUser');
// Route::get('/tag/{id}', 'FrontController@showPostByTag');

// Route::any('login','LoginController@login');
// Route::get('logout', 'LoginController@logout');

// Route::resource('admin/post', 'PostController');
