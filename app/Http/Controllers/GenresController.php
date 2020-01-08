<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;

class GenresController extends Controller
{
    /*public function index()
    {
        $categories = Category::all();
        $events = Event::orderBy('initial_date', 'DESC')->take(4)->get();
        return view("/main")->with("categories", $categories)->with("events", $events);
    }*/

    public function show()
    {
        $genresName = Genre::all();
        $movies= Movie::all();
        return view("/index")->with("movies", $movies)->with("genres", $genresName);
        //return view("/index")->with("genres",$genreName);
    }
}
