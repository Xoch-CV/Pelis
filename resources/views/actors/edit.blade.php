@extends('layouts.main')
 @section('content')
    <div class="container-fluid container">
    <div class="header">
        <h3>{{ __('Edit Info') }}</h3>
    </div>
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-8">
                <form class="" action="/updateactor" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                {{--{{csrf_field()}}--}}
                     
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