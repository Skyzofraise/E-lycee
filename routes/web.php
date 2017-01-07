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
Route::get('lycee', 'FrontController@lycee');
Route::get('mentions', 'FrontController@mentions');
Route::get('contact', 'FrontController@contact');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/dashboard', 'BackController@index');
Route::get('/users', 'UserController@index');


// Route::group(['prefix' => 'admin', 'middleware' => 'auth.teacher'], function() {
//     Route::get('/', 'BackController@index');
//     Route::resource('articles', 'PostController');
//     Route::resource('eleves', 'UserController');
//     Route::resource('questions', 'QuestionController');
//     Route::get('question/{id}/choix', 'QuestionController@ChoiceEdit');
//     Route::put('question/{id}/choix', 'QuestionController@ChoiceUpdate');
// });

// Route::group(['prefix' => 'eleve', 'middleware' => ['auth']], function() {
//    Route::get('/', 'StudentController@index'); 
//    Route::get('question/{id}', 'StudentController@question'); 
//    Route::post('question/{id}', 'StudentController@validChoice'); 
// });
