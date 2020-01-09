@extends('layouts.main')
 @section('content')

    <main>
    @foreach ($genre as $info)
        <h3>{{$info->name}}</h3>
          @foreach ($movies as $movie)
            {{--@if($movie->genre_id == $info->id)--}}
                <h5><a class="index-list" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a> </h4>
                {{--<p>Sinopsis: </p>
                <p>Rating: <b>{{$movie->rating}}</b></p>
                <p>Awards: <b>{{$movie->awards}}</b></p>
                <p>Release date: <b>{{$movie->release_date}}</b></p>
                <p>Lenght: <b>{{$movie->lenght}}</b></p>
                --}}
             {{--@endif--}} 
          @endforeach
          {{--{{ $movies->links() }}--}}
    @endforeach
    </main>
 @endsection


