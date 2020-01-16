@extends('layouts.actors')
 @section('content')

  <div class="container-fluid container">
    <main>

      <div class=" row actor-list">

        {{-- TOP BAR --}}
        <div class="order-list">

          {{-- ADD NEW --}}
          <div class="row-movie-list-addnew">
              <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <form class="" action="{{ route('actors.create')}}" method="get">
                  @csrf
                  <input class="movie-list btn btn-primary add" type="submit" name="" value="Add New">
                </form>
              </div>
          </div>

          {{-- ORDER BY --}}
          <form class="form-inline">
              <div class="form-group">
                  <label class="mr-sm-2" for="inlineFormCustomSelect">Order by: </label>
                  <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                    <option selected>Choose an option</option>
                    <option value="1">A-Z</option>
                    <option value="2">A-Z</option>
                    <option value="3">Rating</option>
                  </select>
                  <input class="movie-list btn btn-primary" type="submit" class="button">
              </div>
          </form>
        </div>
 
          {{-- ACTOR LIST --}}
          <div class="row index px-5 py-2">

            @foreach ($actors as $actor)
              <div class="card actors" style="width: 16rem; height:20rem">
                  <div class="card-header actors">
                    <h6 class="actors-name">{{$actor->first_name}} {{$actor->last_name}}</h6>
                  </div>
                  <img class="card-img actors" src="/storage/{{$actor->photo}}" alt="{{$actor->first_name}}">
                  {{--<div class="card-body actors">--}}
                    <div class="card-img-overlay actors">
                      <a class="btn btn-primary" href="{{ url('/actors/' . $actor->id)}}"><i class="fas fa-info-circle"></i></a> 
                    </div>
                  {{--</div>--}}
              </div>
            @endforeach
          </div>
          {{ $actors->links() }}
      </div>
    </main>
  </div>
 @endsection
