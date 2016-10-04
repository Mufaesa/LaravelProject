<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

use App\movieOverview;
use App\Movies;

class movieDetailController extends Controller
{
    public function getID($movie_id){
        $results = DB::table('movies')
            ->where('id', '=', $movie_id)
            ->get();
        
        return view('movieDetails')->with('results', $results);
    }
}
