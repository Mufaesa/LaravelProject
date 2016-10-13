<?php

namespace App\Http\Controllers;
use App\Http\Requests\movieRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movies;
use DB;


class movieOverviewController extends Controller
{
    public function index()
    {
        //Show all the data from the "movies" table
        $movies = Movies::all();
        
        return view('moviesOverview',['movies' => $movies]);
    }


    public function getID($movie_id)
    {
        $results = DB::table('movies')
            ->where('id', '=', $movie_id)
            ->get();

        return view('movieDetails')->with('results', $results);
    }


    public function goToEditPage()
    {
        $movies = Movies::all();
        
        return view('movieEdit',['movies' => $movies]);
    }


    public function editMovie($movie_id)
    {
        $results = DB::table('movies')
            ->where('id', '=', $movie_id)
            ->get();

        return view('editMovie')->with('results', $results);

    }


   public function create()
   {
       return view('create');
   }


    public function store(movieRequest $request)
    {
//        return $request->all();

//        $input = $request::all();
//
//        Movies::create($request->all());

        $newMovie = new Movies;
        $newMovie->name = $request->title;
        $newMovie->description = $request->description;
        $newMovie->director = $request->director;
        $newMovie->image = "";

        $newMovie->save();

        return redirect('/');
    }

}
