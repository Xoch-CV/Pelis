@extends('layouts.main')
 @section('content')

    <main>
        <h4>{{$movie->title}}</h4>
          @if ($movie->genre)
          <p>Genre: <b>{{$movie->genre->name}}</b></p>
          @endif
          <p>Sinopsis: </p>
          <p>Release date: <b>{{\Carbon\Carbon::parse($movie->release_date)->locale('es')->isoFormat("LL")}}</b></p>
          <p>Rating: <b>{{$movie->rating}}</b></p>
          <p>Awards: <b>{{$movie->awards}}</b></p>
          <p>Length: <b>{{$movie->length}}</b></p> 

         <h4>Actors</h4>

       @foreach ($movie->actors as $actor)
           <a class="index-list" href="{{ url('/actors/' . $actor->id)}}">{{$actor->first_name}} {{$actor->last_name}}</a>
           <br>
       @endforeach  
       
    </main>

 @endsection
