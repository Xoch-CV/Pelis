@extends('layouts.main')
 @section('content')
    <div class="container-fluid container">
    <div class="header">
        <h3>{{ __('Add a Movie') }}</h3>
    </div>
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-8">
                <form class="" action="{{ route('movies.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                     
                    <div class="row">
                         <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="title"><i class="fas fa-user"></i></label>
                            <input id="title" type="text" name="title" value="{{ old('title') }}" autocomplete="title" autofocus placeholder="Title"><br>
                            <p class="errors">{{$errors->first('title')}}</p>
                         </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="genre_name">Genre</label>
                            <input type="text" name="genre_name" value="{{old("genre_name")}}"><br>
                            <p>{{$errors->first("genre_name")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="sinopsis">Sinopsis</label>
                            <input type="text" name="sinopsis" value="{{old("sinopsis")}}"><br>
                            <p>{{$errors->first("sinopsis")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="trailer">Trailer</label>
                            <input type="text" name="trailer" value="{{old("Link")}}"><br>
                            <p>{{$errors->first("trailer")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="release_date">Release date</label>
                            <input type="date" name="release_date" value="{{old("release_date")}}"><br>
                            <p>{{$errors->first("release_date")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="length">Length</label>
                            <input type="number" name="length" value="{{old("length")}}"><br>
                            <p>{{$errors->first("length")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="awards">Awards</label>
                            <input type="number" name="awards" value="{{old("awards")}}"><br>
                            <p>{{$errors->first("awards")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="rating">Rating</label>
                            <input type="number" name="rating" value="{{old("rating")}}"><br>
                            <p>{{$errors->first("rating")}}</p>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="">Image</label>
                        <input type="file" name="image" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                        <button type="submit">Save</button>
                        </div>
                    </div>

                </form>
            </div>
    </div>        
</div>
 @endsection