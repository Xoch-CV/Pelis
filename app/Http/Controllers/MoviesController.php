<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class MoviesController extends Controller
{
    public function index(Request $request)
    {
      if($request->has('q')){
        $movies = Movie::where('title', 'like', '%' . $request->get('q') . '%')
          ->paginate(6)
          ->appends($request ->only('q'));
      }
      else{
        $movies = Movie::paginate(6)->appends($request->only('q'));
      }
        //$movies = Movie::paginate(6);
        //$movies = Movie::all()->orderBy('title', 'desc')->simplePaginate(6);
        return view('movies.movies')->with("movies", $movies);
    }

    public function show(Movie $movie)
    {

      //$this->authorize('edit', $event);
      return view('movies.detail')->with("movie", $movie);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $form){
        
        $rules = [
          'title'=> "string|min:2|unique:movies,title",
          'genre_id'=> "integer|min:1|max:15",
          'sinopsis'=> "string|min:5|max:500",
          'trailer'=> "string|max:200",
          'release_date'=> "date",
          'length'=> "integer|min:60|max:200",
          'rating'=> "numeric|min:0|max:10",
          'awards'=> "integer|min:0",
          'image'=> "file"
        ];

        $this->validate($form, $rules);

        $newMovie = new Movie();

        $path= $form->file('image')->store('public');
        $namePath = basename($path);

        $newMovie->title = $form["title"];
        $newMovie->genre_id = Genre::where('name', 'like','%' . $form["genre_name"] . '%')->value('id');
        //dd($form["genre_name"]);
        //dd($newMovie->genre_id);
        $newMovie->sinopsis = $form["sinopsis"];
        $newMovie->trailer = $form["trailer"];
        $newMovie->release_date= $form["release_date"];
        $newMovie->length= $form["length"];
        $newMovie->rating = $form["rating"];
        $newMovie->awards = $form["awards"];
        $newMovie->image = $namePath;
        
        //$newMovie->genre_id = Genre::where('name', 'like', $form["genre_name"])->value('id');

        $newMovie->save();
        //dd($newMovie);
        return redirect('movies');
    }

    public function edit(Movie $movie)
    {
      //$this->authorize('edit', $event);
        return view('movies.edit')->with("movie", $movie);
    }

    public function update(Request $form, $id){

      $rules = [
        'title'=> "string|min:3",
        'genre_id'=> "integer|min:1|max:15",
        'sinopsis'=> "string|min:5|max:500",
        'trailer'=> "string|max:200",
        'release_date'=> "date",
        'length'=> "integer|min:60|max:200",
        'rating'=> "numeric|min:0|max:10",
        'awards'=> "integer|min:0",
        'image'=> "file"
      ];

      $this->validate($form, $rules);
        
      $path= $form->file('image')->store('public');
      $namePath = basename($path);

      $movie=Movie::find($id);

        $movie->title = $form["title"];
        $movie->genre_id = Genre::where('name', 'like','%' . $form["genre_name"] . '%')->value('id');
        //dd($form["genre_name"]);
        //dd($newMovie->genre_id);
        $movie->sinopsis = $form["sinopsis"];
        $movie->trailer = $form["trailer"];
        $movie->release_date= $form["release_date"];
        $movie->length= $form["length"];
        $movie->rating = $form["rating"];
        $movie->awards = $form["awards"];
        $movie->image = $namePath;
      
      $movie->save();

      return redirect('movies');

    }

    public function destroy($id)
    {
      //dd($form);
      $movie=Movie::find($id);
      //dd($movie);
      $movie->delete();

      return redirect('movies');
    }

    public function order(Request $req){
      $selection = $req->get('selection');
      //dd($selection);
      if($selection=="desc"){
      $movies = Movie::orderBy('title', 'desc');
      //$movies = \DB::table('movies')->orderBy('title', 'asc');
      //$movies->paginate(6);
      //$movies=Movie::paginate(6)->sortByDesc('title'); 
      //$movies = Movie::orderBy('title', 'desc')->paginate(6);
      //$movies = Movie::orderBy('title', 'DESC')->get();
      //$movies = Movie::sortByDesc('title')->get()->paginate(6);
      }else{
      $movies = Movie::orderBy('title', 'asc');
      //$movies=Movie::paginate(6);
      //$movies->sortBy('title');
      //$movies=Movie::paginate(6)->sortBy('title'); 
      //$movies = Movie::orderBy('title', 'asc')->paginate(6);
      //$movies = Movie::orderBy('title', 'ASC')->get();
      //$movies = \DB::table('movies')->orderBy('title', 'asc');
      //$movies->paginate(6);
      //$movies = Movie::sortBy('title')->get()->paginate(6);
      }

      return view('movies.movies', ["movies" =>$movies -> paginate(6)]);
      //return view('movies.movies')->with("movies", $movies);
    }

}
