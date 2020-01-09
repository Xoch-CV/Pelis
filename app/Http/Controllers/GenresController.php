<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;

class GenresController extends Controller
{
    public function index()
    {
        $genresName = Genre::all();
        $movies= Movie::all();
        //$movies= Movie::paginate(3);
        return view("/index")->with("movies", $movies)->with("genres", $genresName);
    }

    public function show($genreName)
    {
        $genre = Genre::where('name', $genreName)->get();
        //dd($genre);
        $genreId = Genre::where('name', $genreName)->pluck('id');
        //dd($genreId);
        $movies=Movie::where('genre_id','like',$genreId)->paginate(3);
        //dd($movies);
        return view("/genre")->with("movies", $movies)->with("genre", $genre);
    }
}
