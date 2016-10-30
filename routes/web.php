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

//Home
Route::get('/', ['as' => 'home.index', 'uses' => 'movieOverviewController@index']);
Route::get('movieDetails/{id}', 'movieOverviewController@movieDetails');

//Movie controls
Route::get('movieEdit',  'movieOverviewController@goToEditPage');
Route::get('create',   'movieOverviewController@create');
Route::get('movieDetails/{id}/edit', 'movieOverviewController@editMovie');
Route::post('movies', 'movieOverviewController@store');
Route::post('update/{id}', 'movieOverviewController@updateMovie');
Route::post('delete/{id}', 'movieOverviewController@deleteMovie');
Route::get('movieInsert', function() {
    return view('movieInsert');
});

//User controls
Route::get('account',   'userController@myAccount');
Route::get('accountEdit/{id}', 'userController@updateAccount');
Route::post('updateUser/{id}', 'userController@store');

//User overview controls
Route::get('search', 'userController@search');
Route::get('userView', 'userController@userOverview');
Route::post('queries', 'UserController@search');
Route::post('toggleUser/{id}', 'UserController@toggleUser');



Auth::routes();

Route::get('/home', 'HomeController@index');
