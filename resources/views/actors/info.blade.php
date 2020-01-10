@extends('layouts.actors')
 @section('content')

    <main>
        <h4>{{$actor->first_name}} {{$actor->last_name }}</h4>
          {{--@if ($actor->movie)
            @foreach ($actor->movie as $movie)
                  <p>Pelicula favorita: <b>{{$movie->title}}</b></p>
            @endforeach      
          @endif
          --}}
          <p>Resume: </p>
          <p>Rating: <b>{{$actor->rating}}</b></p>
          <p>Pelicula favorita: <b>

        <div class="row">

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="/editactor" method="get">
              <input type="hidden" name="id" value="{{$actor->id}}">
              <input type="submit" name="" value="Edit Actor">
            </form>
          </div>
          <br>

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="/deleteactor" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{$actor->id}}">
              <input type="submit" name="" value="Delete Actor">
            </form>
          </div>

        </div>
        <br>
        
          <h4>Movies</h4> 
            @foreach($actor->movies as $movie)
              <a class="index-list" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a>
              <br>
            @endforeach
        

    </main>

 @endsection
