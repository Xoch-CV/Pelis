@extends('layouts.main')
 @section('content')

    <main>
        <h4>{{$movie->title}}</h4>
        <div class="">
          <img src="/storage/{{$movie->image}}" alt="{{$movie->title}}">
        </div>

          <a class="index-list" href="{{$movie->trailer}}"><p>Trailer</p></a>

          @if ($movie->genre)
          <p>Genre: <b>{{$movie->genre->name}}</b></p>
          @endif

          <p>Sinopsis: <b>{{$movie->sinopsis}}</b> </p>
          <p>Release date: <b>{{\Carbon\Carbon::parse($movie->release_date)->locale('es')->isoFormat("LL")}}</b></p>
          <p>Length: <b>{{$movie->length}}</b></p>
          <p>Awards: <b>{{$movie->awards}}</b></p>
          <p>Rating: <b>{{$movie->rating}}</b></p>
        
        <div class="row">

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="{{ route('movies.edit',$movie->id) }}" method="get">
            @csrf
              <input type="submit" name="" value="Edit Movie">
            </form>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="{{ route('movies.destroy',$movie->id) }}" method="post">
              @method('DELETE')
              @csrf
              <input type="submit" name="" value="Delete Movie">
            </form>
          </div>

        </div>
        <br>

        <h4>Actors</h4>
        @foreach ($movie->actors as $actor)
           <a class="index-list" href="{{ url('actors/' . $actor->id)}}">{{$actor->first_name}} {{$actor->last_name}}</a>
           <br>
        @endforeach  
       
    </main>

 @endsection
