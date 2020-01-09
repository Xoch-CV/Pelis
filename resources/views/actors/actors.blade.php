@extends('layouts.main')
 @section('content')
    <main>
        @foreach ($actors as $actor)
              <li>
                <a href="{{ url('/actors/' . $actor->id)}}"> {{$actor->first_name}} {{$actor->last_name}}</a> 
              </li>
        @endforeach

        {{ $actors->links() }}

        <form class="" action="/addactor" method="get">
         {{-- <input type="hidden" name="id" value="">--}}
          <input type="submit" name="" value="Agregar un Actor">
        </form>


    </main>
 @endsection
