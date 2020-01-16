    <div class="main-navbar">
        <nav class="navbar navbar-expand-lg navbar-light">
    
            <!-- Left Side Of Navbar -->

            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/index')}}">
                <img class="logo" style="height:6rem;width:6rem" src="{{asset('img/Pochocleando_2.png')}}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navegation Links -->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('movies')}}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('actors')}}">Actors</a>
                    </li>
                </ul>

            <!-- Center Side Of Navbar -->

            <!-- Search bar -->
                <form class="form-inline my-2 my-lg-7"  action="/actors/{{request('q')}}" method="get">
                @csrf
                    <input class="form-control py-2 col-sm-5 col-md-7 col-lg-7" type="text" name="q" value="{{request('q')}}" placeholder="Which movie are you looking for?">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>

                </form>

            <!-- Right Side Of Navbar -->
                <ul id="myNavbar" class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>