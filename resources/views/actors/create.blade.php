@extends('layouts.main')
 @section('content')
    <div class="container-fluid container">
        <div class="header">
            <h3>{{ __('Create a new actor!') }}</h3>
        </div>
        <div class="row-form-create">
            <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
                <div class="col-10 col-sm-10 col-md-10 col-lg-8"> 
                    <form class="" action="{{ route('actors.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{--{{csrf_field()}}--}}
                        
                        {{--Fisrt Name & Last Name --}}
                        <div class="row">
                            <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                <label for="name">First name : </label>
                                <input id="name" type="text" name="name" value="{{ old('first_name') }}"><br>
                                <p class="errors">{{$errors->first('first_name')}}</p>
                            </div>
                            <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                <label for="surname">Last name : </label>
                                <input id="surname" type="text" name="surname" value="{{ old('las_name') }}" ><br>
                                <p class="errors">{{$errors->first('last_name')}}</p>
                            </div>
                        </div>
                        {{--Nacionality & Birthday & Age--}}
                        <div class="row">
                            <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                <label for="nacionality">Nacionality :</label>
                                <input type="text" name="nacionality" value="{{old("nacionality")}}"><br>
                                <p>{{$errors->first("nacionality")}}</p>
                            </div>
                        
                            <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                <label for="birthday_date">Birthday date :</label>
                                <input type="date" name="birthday_date" value="{{old("birthday_date")}}"><br>
                                <p>{{$errors->first("birthday_date")}}</p>
                            </div>

                            <div class="col-11 col-sm-12 col-md-10 col-lg-3 inputcreate">
                                <label for="edad">Age :</label>
                                <input type="number" name="edad" value="{{old("edad")}}"><br>
                                <p>{{$errors->first("edad")}}</p>
                            </div>
                        </div>
                        {{--Awards & Favorite movie --}}
                        <div class="row">
                            <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                <label for="awards">Awards :</label>
                                <input type="number" name="awards" value="{{old("awards")}}"><br>
                                <p>{{$errors->first("awards")}}</p>
                            </div>
                        <!--
                            <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" value="{{old("rating")}}"><br>
                                <p>{{$errors->first("rating")}}</p>
                            </div>
                        -->
                            <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputcreate">
                                <label for="favorite_movie_name">Favorite Movie :</label>
                                <input type="text" name="favorite_movie_name" value="{{old("favorite_movie_name")}}"><br>
                                <p>{{$errors->first("favorite_movie_name")}}</p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-11 inputfile">
                            <label for="">Foto :</label>
                            <input class="movie-create-file-button" type="file" name="photo" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 button">
                            <button class="movie-create-form btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>    
        </div>        
    </div>
 @endsection