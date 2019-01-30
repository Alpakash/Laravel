@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <div class="col-md-12" >
            <div class="card" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg) ;background-size: cover;">
                <div class="text-white text-center align-items-center py-5 px-4 my-5">
                    <div>
                        <h1 class="card-title pt-3 mb-5 font-bold"><strong>Games are educative.</strong></h1>
                        <p class="mx-5 mb-5">Just play. Have fun. Enjoy the game.There are at least two kinds of games. One could be called finite, the other infinite.
                            A finite game is played for the purpose of winning,
                            an infinite game for the purpose of continuing the play.</p>
                            <a class="btn btn-danger" href="{{url('games2')}}">Games version 2</a>
                        <a class="btn btn-primary" href="#games">Start playing <i class="fa fa-chevron-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
    @foreach($games as $game)
        <!--News card-->
            <div id="games" class="card border mb-4 text-center hoverable">
                <div class="card-body">
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-4 offset-md-1 mx-3 my-3">
                            <!--Featured image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{$game->image}}" width="200px" class="img-fluid" alt="Sample image for first version of blog listing">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-7 text-left mt-3">
                            <!--Excerpt--><br>
                            <h4 class="mb-4"><strong>{{$game->name}}</strong></h4>
                            <p>{{$game->description}}</p>
                            <p>
                                <strong>Release Date:</strong> {{$game->release_date}}<br>
                                <strong>Last Winner:</strong> {{$game->winner}}<br>
                                <strong>Battles Played:</strong> {{count($game->battle)}}
                            </p>
                            <a href="{{url('/battles')}}/{{$game->id}}/create" class="form-control btn btn-success"><i class="fas fa-play"></i>  Play Game</a>
                            <a href="{{url('/battles')}}/game/{{ $game->release_date }}" class="form-control btn btn-green"><i class="fas fa-list"></i>  See {{$game->name}} battles</a>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </div>
            </div>
            <!--News card-->
        @endforeach

    </div>
@endsection
