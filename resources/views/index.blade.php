@extends('layouts.main')
 @section('content')

    <main>
      @foreach ($genres as $genre)
        <a class="index-list" href="{{ url('genres/' . $genre->name) }}">
            <h4>{{$genre->name}}</h4>
        </a>
                  @foreach ($movies as $movie)
                      @if($movie->genre_id == $genre->id)
                          <p><a class="index-list" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a></p>
                      @endif
                  @endforeach
                  {{--{{ $movies->links() }}--}}
      @endforeach
    </main>
 @endsection
