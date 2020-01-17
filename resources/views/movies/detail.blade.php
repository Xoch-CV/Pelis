@extends('layouts.main')
 @section('content')

  <div class="container-fluid container">
    <main>

    <div class="movie-datail">
      <div class= "row movie-datail">
        
        {{-- Info --}}
        <div class="movie-data-detail">
          <h4 class="movie-data-datail-title">{{$movie->title}}</h4>

          <div class="movie-data-detail-group">
            <a href="{{$movie->trailer}}" class="btn btn-primary detail"><i class="fab fa-youtube"></i></a>
            {{--<a class="index-list" href="{{$movie->trailer}}"><p>Trailer</p></a>--}}

            @if ($movie->genre)
            <p class="movie-data-detail-genre">Genre: <b>{{$movie->genre->name}}</b></p>
            @endif
          </div>

          <p>Sinopsis: <b>{{$movie->sinopsis}}</b> </p>
          <p>Release date: <b>{{\Carbon\Carbon::parse($movie->release_date)->locale('es')->isoFormat("LL")}}</b></p>
          <p>Length: <b>{{$movie->length}}m</b></p>
          <p>Awards: <b>{{$movie->awards}}</b></p>
          <p>Rating: <b>{{$movie->rating}}</b></p>
        
          {{--Edit & Delete--}}
          <div class="row-movie-detail-form">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
              <form class="detail-movies-edit" action="{{ route('movies.edit',$movie->id) }}" method="get">
              @csrf
                <input class="movie-detail-form btn btn-primary" type="submit" name="" value="   Edit   ">
              </form>
            </div>

            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
              <form class="detail-movies-delete"  action="{{ route('movies.destroy',$movie->id) }}" method="post">
              @method('DELETE')
              @csrf
                <input class="movie-detail-form btn btn-primary" type="submit" name="" value=" Delete ">
              </form>
            </div>
          </div>
        </div> 

        {{-- Imagen --}}
        <div class="card movie" style="width: 18.7rem; height:20rem">
          <img class="img-movie-detail" src="/storage/{{$movie->image}}" alt="{{$movie->title}}">
        </div>

      </div> 


        {{-- Actors --}}
      <div class="movie-actors">
          <a class="index-actor" href="{{ url('actors')}}"><h4 class="actor-name">Actors</h4></a>

          <div class="movie-actors-index px-5 py-2">
            @foreach ($movie->actors as $actor)
              <div class="card movies-actors" style="width: 14rem; height:16rem">
                <a href="{{ url('actors/' . $actor->id)}}"> <img class="card movie-detail-actors-photo" src="/storage/{{$actor->photo}}" alt="{{$actor->first_name}} {{$actor->last_name}}"></a>
                {{--<a class="index-actor" href="{{ url('actors/' . $actor->id)}}">{{$actor->first_name}} {{$actor->last_name}}</a>--}}
              </div>
            @endforeach 
          </div> 
      </div>   

    </div>
    </main>
 </div>
 @endsection
