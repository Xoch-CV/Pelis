<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(6);
        //$movies = Movie::all()->orderBy('title', 'desc')->simplePaginate(6);
        return view('movies.movies')->with("movies", $movies);
    }

    public function show(Movie $movie)
    {
      //$this->authorize('edit', $event);
      $movie_actors = $movie->actors();
      //dd($movie_actors);
      return view('movies.detail')->with("movie", $movie);//->with("actors", $movie_actors);
    }

}
