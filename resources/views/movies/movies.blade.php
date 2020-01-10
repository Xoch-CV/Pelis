@extends('layouts.main')
 @section('content')
    <main>
      <br>
      <form class="form-inline">
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Order by: </label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose an option</option>
                  <option value="1">A-Z</option>
                  <option value="2">A-Z</option>
                  <option value="3">Awards</option>
                  <option value="3">Rating</option>
                </select>
            </div>
      </form>
      <br>
        @foreach ($movies as $movie)
              <li>
                <a href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}} </a> 
              </li>
        @endforeach

        {{ $movies->links() }}

        <form class="" action="/movies/create" method="get">
         {{-- <input type="hidden" name="id" value="">--}}
          <input type="submit" name="" value="Add Movie">
        </form>
    </main>
 @endsection
