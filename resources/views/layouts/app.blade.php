<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NK Carcassonne</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Bootstrap Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
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
                    <script>
        window.onload = () => {
            let hour = 00;
            let minute = 00;
            let seconds = 00;
            let totalSeconds = 2700;
            let intervalId = null;
            function startTimer() {
                --totalSeconds;
                minute = Math.floor((totalSeconds - hour * 3600) / 60);
                seconds = totalSeconds - (hour * 3600 + minute * 60);

                document.getElementById("minute").innerHTML = minute;
                document.getElementById("seconds").innerHTML = seconds;
            }
            document.getElementById('start-btn').addEventListener('click', () => {
                intervalId = setInterval(startTimer, 1000);
            })
            document.getElementById('stop-btn').addEventListener('click', () => {
                if (intervalId)
                    clearInterval(intervalId);
            });
            document.getElementById('reset-btn').addEventListener('click', () => {
                totalSeconds = 2700;
                document.getElementById("minute").innerHTML = '00';
                document.getElementById("seconds").innerHTML = '00';
            });
        }
    </script>


<!-- Display Countdown Timer -->


<span id="minute">00</span>:<span id="seconds" style="margin-right: 5px;">00</span>
            
            <div>
            <button id="start-btn" class="btn btn-success btn-sm">Start game</button>
            <button id="stop-btn" class="btn btn-warning btn-sm">Pause game</button>
            <button id="reset-btn" class="btn btn-danger btn-sm">Reset time</button>
            </div>
 <!-- End of the timer -->
              

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
                             <a href="/welcome"><button class="btn btn-danger mr-3"> Carcassonne Insights</button></a>
                        </li>
                            <li class="nav-item dropdown">                  
                                <a id="navbarDropdown" class=" dropdown-toggle btn btn-warning" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user"></i>  {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

            

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item" href="/news">
                                      <i class="far fa-newspaper"></i>  News
                                    </a>
                                     <a class="dropdown-item" href="/faq">
                                       <i class="fas fa-question"></i> FAQ
                                    </a>
                                     <a class="dropdown-item" href="/scores">
                                      <i class="far fa-star"></i>  Scores
                                    </a>
                                     <a class="dropdown-item" href="/admins">
                                       <i class="fas fa-crown"></i> Admins
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
 

</body>
</html>
