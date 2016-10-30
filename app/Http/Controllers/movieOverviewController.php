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

    public function __construct()
    {
        //Function that checks wheter the user is logged in.

        $this->middleware('auth', ['except' => ['index', 'getID']]);
    }

    public function index()
    {
        //Returns a view containing all movies from DB.

        $movies = Movies::all();

        return view('moviesOverview', ['movies' => $movies]);
    }


    public function movieDetails($movie_id)
    {
        //Returns a view containing 1 movie with its details.

        $results = DB::table('movies')
            ->where('id', '=', $movie_id)
            ->get();

        return view('movieDetails')->with('results', $results);
    }


    public function goToEditPage()
    {
        //Returns a view just like moviesOverview.

        $movies = Movies::all();

        return view('movieEdit', ['movies' => $movies]);

    }


    public function editMovie($movie_id)
    {
        //Returns a view with a specific movie's info, inserted into an edit form.

        $results = DB::table('movies')
            ->where('id', '=', $movie_id)
            ->get();

        return view('editMovie')->with('results', $results);

    }


    public function create()
    {
        //Returns view for adding new movies.

        return view('create');
    }

    public function deleteMovie($movie_id)
    {
        //Function that deletes a movie from database and then returns to homepage.

        $deletedMovie = Movies::find($movie_id);

        $deletedMovie->delete();

        return redirect('/');
    }

    public function updateMovie($movie_id, movieRequest $request)
    {
        //Function gets all information from the form and then proceeds to update the information in the database.

        $updatedMovie = Movies::find($movie_id);
        if ($request->has('image')) {
            $updatedMovie->image = 'images/' . $request->image;
        }
        $updatedMovie->name = $request->title;
        $updatedMovie->description = $request->description;
        $updatedMovie->director = $request->director;

        $updatedMovie->save();

        $request->session()->flash('status', 'Movie information updated!');

        return redirect('movieEdit');
    }


    public function store(movieRequest $request)
    {
        //Function that gets all the information from the create movie form and adds it to the database.

        if ($request->has('title', 'description', 'director')) {
            $newMovie = new Movies;

            $newMovie->name = $request->title;
            $newMovie->description = $request->description;
            $newMovie->director = $request->director;
            if ($request->has('image')) {
                $newMovie->image = 'images/' . $request->image;
            }


            $newMovie->save();
            
            $request->session()->flash('status', 'New movie added!');

        }

        return redirect('movieEdit');
    }

}
