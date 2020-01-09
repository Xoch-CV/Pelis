@extends('layouts.main')
 @section('content')
    <main>
        @foreach ($movies as $movie)
              <li>
                <a href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a> 
              </li>
        @endforeach

        {{ $movies->links() }}
    </main>
 @endsection
