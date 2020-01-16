<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;

class ActorsController extends Controller
{
    public function index(Request $request)
    {
      if($request->has('q')){
        $actors = Actor::where('first_name', 'like', '%' . $request->get('q') . '%')
          ->paginate(9)
          ->appends($request ->only('q'));
      }
      else{
        $actors = Actor::paginate(9)->appends($request->only('q'));
      }
        //$actors = Actor::paginate(9);
        return view('actors.actors')->with("actors", $actors);
                                    
    }

    public function show(Actor $actor)
    {
      //$this->authorize('edit', $event);
      //$movie = Movie::where('id',$actor->favorite_movie_id)->get(); it is a collection,iterate in view to get property
      $movie = Movie::where('id',$actor->favorite_movie_id)->first(); //it is an object,get property without iterate
      //dd($actor->favorite_movie_id);
      //dd($movie);
      return view('actors.info')->with("actor", $actor)->with("movie",$movie);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $form){

    $rules = [
      'name'=> "required|string|min:2|unique:actors,first_name",
      'surname'=> "required|string|min:1",
      'nacionality'=> "required|string|min:1",
      'birthday_date'=> "required|date",
      'edad'=> "required|integer|min:1|max:100",
      'awards'=> "required|integer|min:0",
      'rating'=> "numeric|min:0|max:10",
      'favorite_movie_id'=> "integer|min:1",
      'photo'=> "required|file"
      ];

    $this->validate($form, $rules);

    $newActor = new Actor();
      
    $path= $form->file('photo')->store('public');
    $namePath = basename($path);

      $newActor->first_name = $form["name"];
      $newActor->last_name = $form["surname"];
      $newActor->nacionality = $form["nacionality"];
      $newActor->birthday_date = $form["birthday_date"];
      $newActor->edad = $form["edad"];
      $newActor->awards =$form["awards"];
      $newActor->rating = 0;
      $newActor->favorite_movie_id = Movie::where('title', 'like','%' . $form["favorite_movie_name"] . '%')->value('id');
      //$newActor->favorite_movie_id = Movie::where('title', 'like', $form["favorite_movie_name"])->value('id');
      //dd($form["favorite_movie_name"]);
      //dd($newActor->favorite_movie_id);
      $newActor->photo = $namePath;

    $newActor->save();

    return redirect('actors');

    }

    public function edit(Actor $actor)
    {
      //$this->authorize('edit', $event);
        return view('actors.edit')->with("actor", $actor);
    }

    public function update(Request $form, $id){

      $rules = [
        'name'=> "required|string|min:2",
        'surname'=> "required|string|min:1",
        'nacionality'=> "required|string|min:1",
        'birthday_date'=> "required|date",
        'edad'=> "required|integer|min:1|max:100",
        'awards'=> "required|integer|min:0",
        'rating'=> "numeric|min:0|max:10",
        'favorite_movie_id'=> "integer|min:1",
        'photo'=> "required|file"
        ];

      $this->validate($form, $rules);

      $path= $form->file('photo')->store('public');
      $namePath = basename($path);
        
      $actor=Actor::find($id);
              
        $actor->first_name = $form["name"];
        $actor->last_name = $form["surname"];
        $actor->nacionality = $form["nacionality"];
        $actor->birthday_date = $form["birthday_date"];
        $actor->edad = $form["edad"];
        $actor->awards =$form["awards"];
        $actor->rating =$form["ratings"];;
        $actor->favorite_movie_id = Movie::where('title', 'like','%' . $form["favorite_movie_name"] . '%')->value('id');
        $actor->photo = $namePath;

      $actor->save();

      return redirect('actors');
    }

    public function destroy(Request $req)
    {
      $actor=Actor::find($req['id']);
      //dd($actor);
      $actor->delete();

      return redirect('actors');
    }
}
