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

Route::get('movieDetails/{id}', 'movieOverviewController@movieDetails');

Route::get('movieDetails/{id}/edit', 'movieOverviewController@editMovie');

Route::get('search', 'userController@search');

Route::get('userView', 'userController@userOverview');

Route::post('queries', array('as'=>'queries', function(){
    return view('search');
}));

Route::get('movieInsert', function() {
    return view('movieInsert');
});

Route::post('updateUser/{id}', 'userController@store');

Route::post('movies', 'movieOverviewController@store');

Route::post('update/{id}', 'movieOverviewController@updateMovie');

Route::post('delete/{id}', 'movieOverviewController@deleteMovie');

Auth::routes();

Route::get('/home', 'HomeController@index');
