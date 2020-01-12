@extends('layouts.actors')
 @section('content')

    <main>
        <h4>{{$actor->first_name}} {{$actor->last_name }}</h4>
        <div class="">
          <img src="/storage/{{$actor->photo}}" alt="{{$actor->first_name}} {{$actor->last_name }}">
        </div>

          <p>Nacionality: <b>{{$actor->nacionality}}</b> </p>
          <p>Birthday date: <b>{{\Carbon\Carbon::parse($actor->birthday_date)->locale('es')->isoFormat("LL")}}</b></p> </p>
          
          <p>Age: <b>{{$actor->edad}}</b></p>
          <p>Awards: <b>{{$actor->awards}}</b></p>
          <p>Rating: <b>{{$actor->rating}}</b></p>

          <p>Pelicula favorita: <b>{{$movie->title}}</b> </p>
          {{--<p>Pelicula favorita:
          @foreach($movie as $info)
               <b>{{$info->title}}</b>
          @endforeach 
          </p>--}}



        <div class="row">

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="{{ route('actors.edit',$actor->id) }}" method="get">
            @csrf
              <input type="hidden" name="id" value="{{$actor->id}}">
              <input type="submit" name="" value="Edit Actor">
            </form>
          </div>
          <br>

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <form class="" action="{{ route('actors.destroy',$actor->id) }}" method="post">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{$actor->id}}">
              <input type="submit" name="" value="Delete Actor">
            </form>
          </div>

        </div>
        <br>
        
        
        <h4>Movies</h4> 
        @if ($actor->movies)
          @foreach($actor->movies as $movie)
            <a class="index-list" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a>
            <br>
          @endforeach
        @endif
      
    </main>

 @endsection
