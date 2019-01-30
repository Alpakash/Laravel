@extends('layouts.app')


@section('content')
    <div class="mb-4">
        <div class="col-md-12">
            <div class="card" style="background-image: url(https://www.battlefields.org/sites/default/files/styles/scale_crop_1280x450/public/thumbnails/image/Gettysburg%20Battle%20Page%20Hero.jpg?itok=l4MbvlMp);background-size: cover;">
                <div class="text-white text-center align-items-center px-4 my-4">
                    <div>
                        <h1 class="card-title pt-3 mb-5 font-bold"><strong>The Battlefield</strong></h1>
                        <p class="mx-5 mb-5">It is better to conquer yourself than to win a thousand battles. Then the victory is yours. It cannot be taken from you, not by angels or by demons, heaven or hell.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
    @if(session()->has('message'))
        <div class="alert alert-success">
            <center>{{ session()->get('message') }}</center>
        </div>
    @endif
<center>
        <a class="btn btn-primary" href="{{url('/battles/1/create')}}">Play GOT <img src="{{$games[0]->img}}" width="40px" style="margin-left:5px;"></a>
        <a class="btn btn-primary" href="{{url('/battles/2/create')}}">Play WOW <img src="{{$games[1]->img}}" width="40px" style="margin-left:5px;"></i></a>
        <a class="btn btn-primary" href="{{url('/battles/3/create')}}">Play LOTR <img src="{{$games[2]->img}}" width="40px" style="margin-left:5px;"></a>
        </center>
        <br><br><br>

        <ul class="list-group">

        @foreach ($battles as $battle)

        <!-- Get the date and time of the battles and format them in day-month-year and show time played game-->
            <div>
                <center>
                    <strong>Played Date:</strong> {{date("d-m-Y ", strtotime($battle->played_date))}} -
                    <strong>Time:</strong> {{date("H:i:s", strtotime($battle->played_date))}} -
                    <strong>Ultimate winner: </strong> <?php if(isset(\App\User::find($battle->won_by)->name)) : ?>{{\App\User::findOrFail($battle->won_by)->name}} <?php endif; ?>
                </center>
            </div>
            <a style="width: 70%; margin: auto;" class="game-overview game-hover mt-1 mb-5" href="{{url("/battles/{$battle->id}")}}">
                    <!-- echo each username in the database in the users table -->
                <li class='game-hover list-group-item clearfix smaller-li'>
                  <center><strong>{{$battle->game['name']}}:</strong> {{ ucfirst($battle->name) }} <img src="{{$battle->game->img}}" width="40px"; style="float:right;"> </center>
                </li></a>
            @endforeach
        </ul>

    </div>
    @endsection