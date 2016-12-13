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
Route::get('actualites', 'FrontController@actualites');
Route::get('actualite/{id}', 'FrontController@actualite');