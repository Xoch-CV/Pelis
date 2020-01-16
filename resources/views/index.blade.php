@extends('layouts.main')
 @section('content')

  <div class="container-fluid container">
    <main>

      @foreach ($genres as $genre)
        <a class="index-genre" href="{{ url('genres/' . $genre->name) }}">
            <h4 class="genre-name">{{$genre->name}}</h4>
        </a>
                <div class="row index px-5 py-2">

                  @foreach ($movies as $movie)
                    @if($movie->genre_id == $genre->id)
                        <div class="card-index-movie pb-2 mr-2">
                          <div class="card" style="width: 16rem; height:27rem">
                              <img class="card-img-top-index" style="height:22rem;" src="storage/{{$movie->image}}" alt="{{$movie->title}}">
                                 <div class="card-body">
                                    
                                    <h5 class="card-title"><a class="index-list-card-tittle" href="{{ url('/movies/' . $movie->id)}}"> {{$movie->title}}</a></h5>
                                    <a href="{{$movie->trailer}}" class="btn btn-primary"><i class="fab fa-youtube"></i></a>

                                 </div>
                          </div>
                        </div> 
                    @endif
                  @endforeach

                </div>
                  
      @endforeach
    
    </main>
  </div>
@endsection


