@extends('layouts.main')
 @section('content')
    <div class="container-fluid container">
    <div class="header">
        <h3>{{ __('Edit Info Actor') }}</h3>
    </div>
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-8">
                <form class="" action="{{ route('actors.update',$actor->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                     
                    <div class="row">
                         <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="name"><i class="fas fa-user"></i></label>
                            <input id="name" type="text" name="name" value="{{ old('first_name') }}" autocomplete="name" autofocus placeholder="First Name"><br>
                            <p class="errors">{{$errors->first('first_name')}}</p>
                         </div>
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="surname"><i class="fas fa-user"></i></label>
                            <input id="surname" type="text" name="surname" value="{{ old('las_name') }}" autocomplete="surname" autofocus placeholder="Last Name"><br>
                            <p class="errors">{{$errors->first('last_name')}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="nacionality">Nacionality</label>
                            <input type="text" name="nacionality" value="{{old("nacionality")}}"><br>
                            <p>{{$errors->first("nacionality")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="birthday_date">Birthday date</label>
                            <input type="date" name="birthday_date" value="{{old("birthday_date")}}"><br>
                            <p>{{$errors->first("birthday_date")}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="edad">Age</label>
                            <input type="number" name="edad" value="{{old("edad")}}"><br>
                            <p>{{$errors->first("edad")}}</p>
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

                    <!-- Movie -->
                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputregister">
                            <label for="favorite_movie_name">Favorite Movie</label>
                            <input type="text" name="favorite_movie_name" value="{{old("favorite_movie_name")}}"><br>
                            <p>{{$errors->first("favorite_movie_name")}}</p>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="">Foto</label>
                        <input type="file" name="photo" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-2">
                        <button type="submit">Update</button>
                        </div>
                    </div>

                </form>
            </div>
    </div>        
</div>
 @endsection