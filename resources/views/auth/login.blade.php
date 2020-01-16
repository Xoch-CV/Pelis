@extends('layouts.form')

@section('content')

    <div class="container" >
        <div class="row logo" style="height:8rem;width:8rem" >
            <a class=" " href="{{ url('/index')}}">
            <img class="logo" src="{{asset('img/Pochocleando_2.png')}}" alt="">
            </a>
        </div>

        <div class="row" style="display: flex; flex-direction: column; align-content:center">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="col-10 col-sm-10 col-md-8 col-lg-4 inputauth">
                    <label for="email"><i class="fas fa-envelope"></i></label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="joe@schmoe.com"><br>
                    <p class="errors">{{$errors->first('email')}}</p>
                </div>
                <div class="col-10 col-sm-10 col-md-8 col-lg-4 inputauth">
                    <label for="pass"><i class="fas fa-unlock"></i></label>
                    <input id="password" type="password" name="password" autocomplete="new-password" placeholder="Password"><br>
                    <p class="errors">{{$errors->first('password')}}</p>
                </div>
                <div class="col-10 col-sm-10 col-md-8 col-lg-4 checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                    </label>
                </div>
                {{-- Button --}}
                <div class="col-10 col-sm-12 col-md-8 col-lg-4 botonera-login">
                    <div class="row" style="display: flex; flex-direction: row; justify-content: space-around;">
                        <button class="movie-create-form btn btn-primary login" type="submit" name="boton" value="{{ __('Login') }}">Log in</button>
                        <a class="movie-create-form btn btn-primary register" href="{{ route('register') }}">Sign up</a>
                    </div>
                    <div class="col-11 col-sm-12 col-md-10 col-lg-11">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link forget" href="{{ route('password.request') }}">
                                {{ __('Forget your password?') }}
                            </a>
                        @endif
                    </div>
                </div>       

                        {{--<div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>--}}
            </form>
        </div>
    </div>
@endsection
