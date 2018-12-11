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

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link waves-effect" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">

                    <li class="nav-item">
                        <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                           target="_blank">
                            <i class="fa fa-github mr-2"></i>Home
                        </a>
                    </li>
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
