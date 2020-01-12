@extends('layouts.actors')
 @section('content')
    <main>
      <h4>Actors</h4>
      <form class="form-inline">
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Order by: </label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose an option</option>
                  <option value="1">A-Z</option>
                  <option value="2">A-Z</option>
                  <option value="3">Rating</option>
                </select>
            </div>
      </form>
      <br>
 
        @foreach ($actors as $actor)
              <li>
                <a class="index-list"href="{{ url('/actors/' . $actor->id)}}"> {{$actor->first_name}} {{$actor->last_name}}</a> 
              </li>
        @endforeach

        {{ $actors->links() }}

        <form class="" action="{{ route('actors.create')}}" method="get">
        @csrf
          <input type="submit" name="" value="Add Actor">
        </form>


    </main>
 @endsection
