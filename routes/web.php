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

Route::pattern('id', '[1-9][0-9]*');

Route::get('/', 'FrontController@index');
Route::get('actualites', 'FrontController@actualites');
Route::get('actualite/{id}', 'FrontController@actualite');

Route::get('lycee', 'FrontController@lycee');
Route::get('mentions', 'FrontController@mentions');
Route::get('contact', 'FrontController@contact');

Auth::routes();
Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth.teacher'], function() {
	Route::get('dashboard', 'BackController@index');

	Route::resource('questions', 'QuestionController');
	Route::get('question/{id}/choix', 'QuestionController@EditChoice');
	Route::put('question/{id}/choix', 'QuestionController@ChoiceUpdate');

	Route::get('users', 'UserController@index');
	Route::resource('posts', 'PostController');
});

Route::group(['middleware' => ['auth']], function() {
	Route::get('student', 'StudentController@index');
	Route::get('qcm', 'StudentController@questions'); 
	Route::get('qcm/{id}', 'StudentController@question'); 
	Route::post('qcm/{id}', 'StudentController@validation');

