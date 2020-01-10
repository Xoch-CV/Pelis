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
      return view('actors.info')->with("actor", $actor);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $form){
        $newActor = new Actor();

        $newActor->first_name = $form["name"];
        $newActor->last_name = $form["surname"];
        $newActor->rating = $form[0];
        $newActor->favorite_movie_id = Movie::where('title', 'like','%' . $form["favorite_movie_name"] . '%')->value('id');
        //$newActor->favorite_movie_id = Movie::where('title', 'like', $form["favorite_movie_name"])->value('id');
        //dd($form["favorite_movie_name"]);
        //dd($newActor->favorite_movie_id);
        $newActor->save();

        return redirect('/actors');
    }

    public function edit(Actor $actor)
    {
      //$this->authorize('edit', $event);
        return view('actors.edit')->with("actor", $actor);
    }

    public function update(Request $form){
        
        $actor=Actor::find($form['id']);
        $actor->first_name = $form["name"];
        $actor->last_name = $form["surname"];
        $actor->rating = $form["rating"];
        $actor->favorite_movie_id = Movie::where('title', 'like','%' . $form["favorite_movie_name"] . '%')->value('id');
        
        $actor->update();

        return redirect('/actors');
    }

    public function destroy(Request $req)
    {
      $actor=Actor::find($req['id']);
      //dd($actor);
      $actor->delete();

      return redirect('/actors');
    }
}
