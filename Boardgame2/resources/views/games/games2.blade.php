@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <div class="col-md-12">
            <div class="card" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);background-repeat: no-repeat;background-size: cover;">
                <div class="text-white text-center align-items-center py-5 px-4 my-5">
                    <div>
                        <center><h1 class="card-title pt-3 mb-5 font-bold"><strong>Total battles played: {{$totalBattlesPlayed}}</strong></h1>
                        <p class="mx-5 mb-5">Just play. Have fun. Enjoy the game.There are at least two kinds of games. One could be called finite, the other infinite.
                            A finite game is played for the purpose of winning,
                            an infinite game for the purpose of continuing the play.</p>
                        <a class="btn btn-success" href="{{url('games')}}">Games version 1</a>
                        <a class="btn btn-primary" href="#games">Start playing <i class="fa fa-chevron-down"></i></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">



    <!-- Card deck -->
    <div id="games" class="card-deck">

        <!-- Card -->
        @foreach($games as $game)
        <div class="card mb-4">
            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top" src="{{$game->battle_img}}" height="250" alt="Card image cap">
                <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->

                <h4 class="text-center card-title">{{$game->name}}</h4>
                <p><em>Battles played: {{count($game->battle)}}</em></p>

                <!--Text-->
                <p class="card-text">{{$game->description}}</p>

                <p class="card-text">
                    <strong>Last winner:</strong> {{$game->winner}}
                </p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <a href="{{url('/battles')}}/{{$game->id}}/create"><button type="button" class="form-control btn btn-success btn-md"><i class="fas fa-play"></i> Play game</button></a>
                <a href="{{url('/battles')}}/game/{{ $game->release_date }}"><button type="button" class="form-control btn btn-green btn-md"><i class="far fa-list-alt"></i> See battles</button></a>

            </div>

        </div>
        @endforeach
        <!-- Card -->
    </div>
    <!-- Card deck -->

    </div>
@endsection