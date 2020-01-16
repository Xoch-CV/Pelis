@extends('layouts.form')

@section('content')
    <div class="container">
        {{-- Logo --}}
        <div class="row logo" style="height:8rem;width:8rem" >
            <a class=" " href="{{ url('/index')}}">
            <img class="logo" src="{{asset('img/Pochocleando_2.png')}}" alt="">
            </a>
        </div>
        {{-- Form --}}
        <div class="row">
            <div class="col-1 col-sm-1 col-md-1 col-lg-2"></div>
            <div class="col-10 col-sm-10 col-md-10 col-lg-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    {{-- name --}}
                    <div class="row">
                         <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputauth-reg">
                            <label for="name"><i class="fas fa-user"></i></label>
                            <input id="name" type="text" class=" @error('password') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Name"><br>
                            <p class="errors">{{$errors->first('name')}}</p>
                         </div>
                    </div>
                    {{-- email --}}
                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputauth-reg">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="joe@schmoe.com"><br>
                            <p class="errors">{{$errors->first('email')}}</p>
                        </div>
                    </div>
                    {{-- Pass & Confirm pass --}}
                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputauth-reg">
                            <label for="pass"><i class="fas fa-unlock"></i></label>
                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Minimum 8 characters"><br>
                            <p class="errors">{{$errors->first('password')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 col-sm-12 col-md-10 col-lg-5 inputauth-reg">
                            <label for="re-pass"><i class="fas fa-lock"></i></label>
                            <input id="password-confirm" type="password" class="" name="password_confirmation" autocomplete="new-password" placeholder="Minimum 8 characters"><br>
                            <p class="errors">{{$errors->first('password_confirmation')}}</p>
                        </div>
                    </div>
                    <div class = "row">
                        <div class="col-10 col-sm-10 col-md-8 col-lg-4 checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('terms and conditions') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                            {{ __('Agree with terms and conditions') }}
                            </label>
                        </div>
                    </div>
                    {{-- Button --}}
                    <div class="col-10 col-sm-12 col-md-8 col-lg-4 botonera-login">
                        <div class="row" style="display: flex; flex-direction: row; justify-content: space-around;">
                            <button class="movie-create-form btn btn-primary register" type="submit" name="boton" value="{{ __('Register') }}">Sign up</button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
    </div>
@endsection