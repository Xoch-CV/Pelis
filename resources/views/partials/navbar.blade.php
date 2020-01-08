<div class="main-navbar">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    
    <!-- Left Side Of Navbar -->

        <!-- Logo -->
        <a class="navbar-brand" href="#">DPelis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navegation Links -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actors</a>
                </li>
            </ul>

    <!-- Center Side Of Navbar -->

        <!-- Search bar -->
        <form class="form-inline my-2 my-lg-0">
            <!--<input class="form-control mr-md-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button">
            <i class="far fa-search"></i>
            </button>-->

            <!--<div class="input-group col-md-4">-->
                <input class="form-control py-2 border-right-0 border" type="search" value="search" placeholder="Search">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary border-left-0 border" type="button">
                        <i class="fa fa-search"></i>
                        </button>
                    </span>
            <!--</div>-->

        </form>

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
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