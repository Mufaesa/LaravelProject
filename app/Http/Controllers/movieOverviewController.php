<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\movieOverview;

class movieOverviewController extends Controller
{
    public function index(){

        //Show all the data from the "movies" table
        $movies = movieOverview::all();
        
        return view('moviesOverview',['movies' => $movies]);
    }
}
