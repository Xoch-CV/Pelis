@extends('layouts.actors')
 @section('content')

  <div class="container-fluid container">
    <main>

      <div class="actor-info">
        
        <div class= "row actor-info">

        {{-- Info --}}
          
            {{-- Photo --}}

            <div class="card actors" style="width:18.7rem; height:25rem">
              <img class="img-actors-info" src="/storage/{{$actor->photo}}" alt="{{$actor->first_name}} {{$actor->last_name }}">
            </div>

            {{-- Biography --}}  
            
            <div class="actor-data-info">
              <h4 class="actor-info-title">{{$actor->first_name}} {{$actor->last_name }}</h4>
              <p>Nacionality: <b>{{$actor->nacionality}}</b> </p>
              <p>Birthday date: <b>{{\Carbon\Carbon::parse($actor->birthday_date)->locale('es')->isoFormat("LL")}}</b></p>
              
              <p>Age: <b>{{$actor->edad}}</b></p>
              <p>Awards: <b>{{$actor->awards}}</b></p>
              <p>Rating: <b>{{$actor->rating}}</b></p>

              <p>Pelicula favorita: <b>{{$movie->title}}</b> </p>
              {{--<p>Pelicula favorita:
              @foreach($movie as $info)
                  <b>{{$info->title}}</b>
              @endforeach 
              </p>--}}
          
              {{--Edit & Delete--}}
              <div class="row actor-info-form">

                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <form class="actor-info-edit" action="{{ route('actors.edit',$actor->id) }}" method="get">
                  @csrf
                    <input type="hidden" name="id" value="{{$actor->id}}">
                    <input class="actor-info-form btn btn-primary" type="submit" name="" value="   Edit   ">
                  </form>
                </div>
                <br>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <form class="actor-info-edit" action="{{ route('actors.destroy',$actor->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{$actor->id}}">
                    <input class="actor-info-form btn btn-primary" type="submit" name="" value=" Delete ">
                  </form>
                </div>

              </div>
        
            </div>
        
      </div>

        {{-- Movies --}}
        <div class="actors-movies">
          <a class="index-movies" href="{{ url('movies')}}"><h4 class="movie-title">Movies</h4></a>
          
          <div class="actors-movie-index px-5 py-2">
          @if ($actor->movies)
            @foreach($actor->movies as $movie)
            <div class="card actor-movies" style="width: 14rem; height:16rem">
            <a href="{{ url('/movies/' . $movie->id)}}"><img class="card actor-info-movies-img" src="/storage/{{$movie->image}}" alt="{{$movie->title}}"></a>
              {{--<a class="index-movies" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a>--}}
            </div>
            @endforeach
          @endif
          </div>
        </div>

    </main>
  </div>
 @endsection
