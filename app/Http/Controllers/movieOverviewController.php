<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\movies;

class movieOverviewController extends Controller
{
    public function index(){

        //Show all the data from the "movies" table
        $movies = movies::all();
        
        return view('moviesOverview',['movies' => $movies]);
    }
    
    public function editPage(){
        $movies = movies::all();
        
        return view('movieEdit',['movies' => $movies]);
    }

   public function addMovie(){
       return view('addMovie');
   }

    public function storeMovie()
    {
        // validate
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = new Nerd;
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('nerds');
        }
    }

}
