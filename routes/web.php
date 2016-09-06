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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {

	// user apis
	Route::get('/user/{id}', 'UserController@get');
	Route::post('/user/save', 'UserController@save');
	Route::get('/users', 'UserController@index');

	Route::get('/config', 'GuestController@config');
	Route::post('/login', 'GuestController@login');
	Route::get('/logout', 'GuestController@logout');
	Route::get('/', 'GuestController@index');

});