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

Route::get('/', ['as' => 'home.index', 'uses' => 'movieOverviewController@index']);

Route::get('movieEdit',  'movieOverviewController@goToEditPage');

Route::get('create',   'movieOverviewController@create');

Route::get('account',   'userController@myAccount');

Route::get('accountEdit/{id}', 'userController@updateAccount');

Route::get('movieInsert', function() {
    return view('movieInsert');
});

Route::post('updateUser/{id}', 'userController@store');

Route::post('movies', 'movieOverviewController@store');

Route::post('update/{id}', 'movieOverviewController@updateMovie');

Route::post('delete/{id}', 'movieOverviewController@deleteMovie');

Route::get('movieDetails/{id}', 'movieOverviewController@getID');

Route::get('movieDetails/{id}/edit', 'movieOverviewController@editMovie');

Auth::routes();

Route::get('/home', 'HomeController@index');
