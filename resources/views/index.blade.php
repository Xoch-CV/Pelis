@extends('layouts.main')
 @section('content')

    <main>
      @foreach ($genres as $genre)
            <h4>{{$genre->name}}</h4>
                  @foreach ($movies as $movie)
                      @if($movie->genre_id == $genre->id)
                          <li>
                          {{$movie->title}}
                          </li>
                      @endif
                  @endforeach
      @endforeach
    </main>
 @endsection
