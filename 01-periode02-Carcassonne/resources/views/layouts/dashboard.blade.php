<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   @include('layouts.header')
</head>
<body class="grey lighten-3 preload">
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">

        {{--<!-- Brand -->--}}
        {{--<a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">--}}
        {{--<strong class="blue-text">999games</strong>--}}
        {{--</a>--}}

        <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

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

                        <li class="nav-item">
                            <a href="{{url('/profile')}}"><button class="btn btn-danger mr-3"><i class="fa fa-book"></i> Profiel</button></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" dropdown-toggle btn btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-user"></i>  {{ Auth::user()->name }} <span class="caret"></span>
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
                                <a class="dropdown-item" href="{{url('/judge')}}">
                                    <i class="fas fa-crown"></i> Judge
                                </a>

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
    <!-- Navbar -->
    @if(Session::has('msg-success'))
        <div class="message-wrap box-shadow">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <span>{!! session('msg-success') !!}</span>
            </div>
        </div>
    @elseif(Session::has('msg-danger'))
        <div class="message-wrap danger box-shadow">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <span>{!! session('msg-success') !!}</span>
            </div>
        </div>
    @endif
    @yield('content')

    {{--@include('layouts.footer')--}}
    @include('layouts.scripts')


</body>
</html>
