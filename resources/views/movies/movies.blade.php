@extends('layouts.main')
 @section('content')
    <main>
      <br>
      <form class="form-inline" action="/movies/orderby" method="post">
        @csrf
            <div class="form-group">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Order by: </label>
                <select name="selection" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option value selected = "Select an option">Select an option</option>
                  <option value="asc">A-Z</option>
                  <option value="desc">Z-A</option>
                  <option value="awards">Awards</option>
                  <option value="rating">Rating</option>
                </select>
            </div>
            <input type="submit" class="button">
      </form>
      <br>
        @foreach ($movies as $movie)
              <li>
                <a href="{{ url('movies/' . $movie->id)}}"> {{$movie->title}} </a> 
              </li>
        @endforeach

        {{ $movies->links() }}

        <form class="" action="{{ route('movies.create')}}" method="get">
         @csrf
          <input type="submit" name="" value="Add Movie">
        </form>
    </main>
 @endsection
