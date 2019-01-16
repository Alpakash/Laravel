
    <nav class="navbar  navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="https://upload.wikimedia.org/wikipedia/it/3/38/Carcassonne_Logo.png" width="100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <!-- Countdown Timer JavaScript-->
                    @include('layouts.countdown')

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else

                        @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a href="{{url('/admin')}}"><button class="btn btn-primary mr-3"> Admin Dashboard</button></a>
                        </li>
                            @elseif(Auth::user()->isJudge())
                                <li class="nav-item">
                                    <a href="{{url('/judge')}}"><button class="btn btn-primary mr-3"> Judge Page</button></a>
                                </li>
                        @endif

                    <li class="nav-item">
                         <a href="{{url('/profile')}}"><button class="btn btn-success mr-3"> <i class="fas fa-user"></i> Mijn Profiel</button></a>
                    </li>


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" dropdown-toggle btn btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               Menu <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="{{url('/news')}}">
                                  <i class="far fa-newspaper"></i>  News
                                </a>
                                 <a class="dropdown-item" href="{{url('/faq')}}">
                                   <i class="fas fa-question"></i> FAQ
                                </a>
                                 <a class="dropdown-item" href="{{url('/scores')}}">
                                  <i class="far fa-star"></i>  Scores
                                </a>
                                @if(Auth::user()->isJudge() || Auth::user()->isAdmin())
                                <a class="dropdown-item" href="{{url('/judge')}}">
                                   <i class="fas fa-crown"></i> Judge
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                               </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
