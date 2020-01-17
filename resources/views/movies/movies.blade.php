@extends('layouts.main')
 @section('content')

  <div class="container-fluid container">
    <main>
    
      <div class="row movie-list">


        {{-- TOP BAR --}}
        <div class="order-list">

          {{-- ADD NEW --}}
          <div class="row-movie-list-addnew">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <form class="addnew" action="{{ route('movies.create')}}" method="get">
                @csrf
                  <input class="movie-list btn btn-primary add" type="submit" name="" value="Add New">
                </form>
            </div>
          </div>

          {{-- ORDER BY --}}
          <form class="form-inline" action="/movies/orderby" method="post">
            @csrf
                <div class="form-group order-selector">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Order by: </label>
                    <select name="selection" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                      <option value selected = "Select an option">Select an option</option>
                      <option value="asc">A-Z</option>
                      <option value="desc">Z-A</option>
                      <option value="awards">Awards</option>
                      <option value="rating">Rating</option>
                    </select>
                    {{--</div calss="button">--}}
                    <input class="movie-list btn btn-primary submit" type="submit" class="button">
                    {{--</div>--}}
                </div>
          </form>
          
        </div>

        {{-- MOVIE LIST --}}
        <div class="row index px-5 py-2">
          
            @foreach ($movies as $movie)
            <div class="card-index-movie pb-2 mr-2">
              <div class="card movies" style="width: 14rem; height:16rem">
                  <img class="card-img movies" src="/storage/{{$movie->image}}" alt="{{$movie->title}}">
                  <div class="card-img-overlay movies"> 
                    <a href="{{$movie->trailer}}" class="btn btn-primary"><i class="fab fa-youtube"></i></a>
                    <a href="{{ url('movies/' . $movie->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i></a> 
                  </div>
              </div>
            </div>
            @endforeach

        </div>
        {{ $movies->links() }}
      </div>
    </main>
  </div>
 @endsection
