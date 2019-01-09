<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Carcassonne</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("http://4.bp.blogspot.com/-MY_dJWibfm4/Vq6HldIIAoI/AAAAAAAAS2k/l3nElNBzNG8/s1600/carcassonnee-complete-road.JPG");
                background-size: auto;
                background-repeat: no-repeat;
                 background-position: right;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                
            }

            .linkColorHover:hover {
                color: rgba(220, 220, 220, 1);
                font-weight: 0;
                font-style: italic;
            }

            .modal-title, .modal-body {
                color: #000;
                text-align: left;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-family: 'Limoges', 'Nunito', sans-serif;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 18px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                       <a class="linkColorHover" href="{{ url('/profile') }}">My Profile</a>
                           <a class="linkColorHover" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                   
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf

                                   </form>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                 <img src="https://spellenspektakel.nl/wp-content/uploads/2015/10/999-Games-Logo_web-10cm-vierkant-280x280.png" width="150px"> 
                <div class="title m-b-md">
                  Carcassonne
                </div>

                <div class="links">

     <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#instructionsModal">
  Instructions
</button>

<!-- Modal -->
<div class="modal fade" id="instructionsModal" tabindex="-1" role="dialog" aria-labelledby="instructionsModalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="instructionsModalTitle">Over 999 Games</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body float-left">
       <p> Al bijna 30 jaar is 999 Games actief als distributeur van spelproducten in de Benelux.</p>

Vanaf 1998 begeeft het bedrijf zich op het uitgeverspad met een nieuwe generatie bordspellen,

<p>die zich onderscheiden door het gebruik van eersteklas kartonnage, fraai artwork en hoogwaardige</p>

<p>materialen. Speelplezier voor ieder niveau en elk type speler staan voorop in de spellen. 999 Games</p>

<p>voert titels in de categorieën kinderspellen, familiespellen, strategiespellen, reisspellen en buitenspellen.</p>

<p>Bekende titels zijn: Catan, Halli Galli, Regenwormen, Carcassonne, 30 Seconds en Machiavelli. Voor</p>

<p>meer informatie: <a href="https://www.999games.nl" target="_blank">www.999games.nl</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                    <a class="linkColorHover" href="/news">News</a>
                    <a class="linkColorHover" href="/faq">FAQ</a>
                    <a class="linkColorHover" href="/scores">Scores</a>
                    <a class="linkColorHover" href="/admins">Admins</a>
                </div>
            </div>
        </div>

          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
