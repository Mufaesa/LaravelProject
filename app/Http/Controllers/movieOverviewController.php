<?php

namespace App\Http\Controllers;
use App\Http\Requests\movieRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movies;
use DB;
use Illuminate\Support\Facades\App;


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

    public function deleteMovie ($movie_id)
    {

        $deletedMovie = Movies::find($movie_id);

        $deletedMovie->delete();

        return redirect('/');
    }

    public function updateMovie($movie_id, movieRequest $request)
    {

        $updatedMovie = Movies::find($movie_id);
        $updatedMovie ->name = $request->title;
        $updatedMovie->description = $request->description;
        $updatedMovie->director = $request->director;

        $updatedMovie->save();

        return redirect('/');
    }


    public function store(movieRequest $request)
    {

        $newMovie = new Movies;
        $newMovie->name = $request->title;
        $newMovie->description = $request->description;
        $newMovie->director = $request->director;
        $newMovie->image = "";

        $newMovie->save();

        return redirect('/');
    }

}
