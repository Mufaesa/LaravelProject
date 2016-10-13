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

Route::get('account', function() {
    return view('myAccount');
});

Route::get('movieInsert', function() {
    return view('movieInsert');
});

Route::post('movies', 'movieOverviewController@store');

Route::get('movieDetails/{id}', 'movieOverviewController@getID');

Route::get('movieDetails/{id}/edit', 'movieOverviewController@editMovie');









//Echo name given in url
Route::get('hello/{name}', function($name) {
    echo 'hello ' . $name;
});

//Echo name of a random user from database
Route::get('randomUser', function() {
    $user = App\User::all();
    echo $user->random()->name;
});

//create an item
Route::post('test', function (){
    echo "You just hit the submit button";
});

//read an item
Route::get('test', function(){
    echo '<form action="test" method="POST">';
    echo '<input type="submit">';
    echo '<input type="hidden" value="' . csrf_token() . '" name="_token">';
    echo '<input type="hidden" name="_method" value="POST">';
    echo '</form>';
});

//update an item
Route::put('test', function (){
    echo "You just read the submit button";
});

//delete an item
Route::delete('test', function (){
    echo "You just deleted the submit button";
});


Auth::routes();

Route::get('/home', 'HomeController@index');
