@extends('layouts.main')
 @section('content')
    <div class="container-fluid container">
        <div class="header">
            <h3>{{ __('Edit movie detail!') }}</h3>
        </div>
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
                <div class="col-10 col-sm-10 col-md-10 col-lg-8">
                    <form class="" action="{{ route('movies.update',$movie->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                            {{--Title & Genre --}} 
                            <div class="row">
                                <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                    <label for="title">Title: </label>
                                    <input id="title" type="text" name="title" value="{{ old('title') }}"><br>
                                    <p class="errors">{{$errors->first('title')}}</p>
                                </div>
                    
                                <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                    <label for="genre_name">Genre: </label>
                                    <input type="text" name="genre_name" value="{{old("genre_name")}}"><br>
                                    <p>{{$errors->first("genre_name")}}</p>
                                </div>
                            </div>
                            {{-- Sinopsis --}} 
                            <div class="row">
                                <div class="col-11 col-sm-12 col-md-10 col-lg-11 inputcreate">
                                    <label for="sinopsis">Sinopsis: </label>
                                    <input type="text" name="sinopsis" value="{{old("sinopsis")}}"><br>
                                    <p>{{$errors->first("sinopsis")}}</p>
                                </div>
                            </div>
                            {{-- Trailer & releasse date & Length --}} 
                            <div class="row">
                                <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                    <label for="trailer">Trailer: </label>
                                    <input type="text" name="trailer" value="{{old("Link")}}"><br>
                                    <p>{{$errors->first("trailer")}}</p>
                                </div>

                                <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                    <label for="release_date">Release date: </label>
                                    <input type="date" name="release_date" value="{{old("release_date")}}"><br>
                                    <p>{{$errors->first("release_date")}}</p>
                                </div>

                                <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                    <label for="length">Length: </label>
                                    <input type="number" name="length" value="{{old("length")}}"><br>
                                    <p>{{$errors->first("length")}}</p>
                                </div>
                            </div>
                            {{-- Awards & Rating --}} 
                            <div class="row">
                                <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                    <label for="awards">Awards: </label>
                                    <input type="number" name="awards" value="{{old("awards")}}"><br>
                                    <p>{{$errors->first("awards")}}</p>
                                </div>

                                <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                    <label for="rating">Rating: </label>
                                    <input type="number" name="rating" value="{{old("rating")}}"><br>
                                    <p>{{$errors->first("rating")}}</p>
                                </div>
                            </div>


                            {{-- Buttons --}}
                            <div class="row">
                            {{--<div class="row form-create-button">--}}
                                <div class="col-6 col-sm-6 col-md-6 col-lg-11 inputfile">
                                    <label for="">Image : </label>
                                    <input class="movie-create-file-button" type="file" name="image" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-6 col-md-6 col-lg-3 button">
                                    <button class="movie-create-form btn btn-primary" type="submit">  Update  </button>
                                </div>
                            {{--</div>--}}
                            </div>

                    </form>
                </div>
        </div>        
    </div>
 @endsection