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
      //dd($movie_actors);
      return view('movies.detail')->with("movie", $movie);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $form){
        

        $rules = [
          'title'=> "string|min:3|unique:movies,title",
          'sinopsis'=> "string|min:5|max:200",
          'release_date'=> "date",
          'length'=> "integer|min:60|max:200",
          'rating'=> "numeric|min:0|max:10",
          'awards'=> "integer|min:0"
          //'photo'=> "",
        ];

        $this->validate($form, $rules);

        $newMovie = new Movie();

        $newMovie->title = $form["title"];
        $newMovie->rating = $form["rating"];
        $newMovie->awards = $form["awards"];
        //$newMovie->genre_id = Genre::where('name', 'like','%' . $form["genre_name"] . '%')->value('id');
        //$newMovie->genre_id = Genre::where('name', 'like', $form["genre_name"])->value('id');
        //dd($form["genre_name"]);
        //dd($newMovie->genre_id);
        $newMovie->release_date= $form["release_date"];
        $newMovie->length=$form["length"];
 
        $newMovie->save();
        //dd($newMovie);
        return redirect('/movies');
    }

    public function edit(Movie $movie)
    {
      //$this->authorize('edit', $event);
        return view('movies.edit')->with("movie", $movie);
    }

    public function update(Request $form, $id){

      $rules = [
        'title'=> "string|min:3|unique:movies,title",
        'sinopsis'=> "string|min:5|max:200",
        'release_date'=> "date",
        'length'=> "integer|min:60|max:200",
        'rating'=> "numeric|min:0|max:10",
        'awards'=> "integer|min:0"
        //'photo'=> "",
      ];

      $this->validate($form, $rules);
        
      $movie=Movie::find($id);

        $movie->title = $form["title"];
        $movie->rating = $form["rating"];
        $movie->awards = $form["awards"];
        //$movie->genre_id = Genre::where('name', 'like','%' . $form["genre_name"] . '%')->value('id');
        //$movie->genre_id = Genre::where('name', 'like', $form["genre_name"])->value('id');
        //dd($form["genre_name"]);
        //dd($movie->genre_id);
        $movie->release_date= $form["release_date"];
        $movie->length=$form["length"];
        
        $movie->update();

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

}
