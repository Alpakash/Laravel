@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        {{-- If a message is send to the view via a controller. Show it here. --}}
        @if(session()->has('message'))
            <div class="alert alert-success">
                <center>{{ session()->get('message') }}</center>
            </div>
        @endif

        <h1 class="text-center mb-5">{{count($battles)}} {{$battles[0]->game_name}} battles             <a class="btn btn-primary" href="{{url('/battles/2/create')}}">Play GOT <img src="{{$battles[0]->img}}" width="40px" style="margin-left:5px;"></a>
        </h1>

        <ul class="list-group">
            <ul class="list-group">
            @foreach ($battles as $battle)

                <!-- Get the date and time of the battles and format them in day-month-year and show time played game-->
                    <div>
                        <center>
                            <strong>Played Date:</strong> {{date("d-m-Y ", strtotime($battle->played_date))}} -
                            <strong>Time:</strong> {{date("H:i:s", strtotime($battle->played_date))}} -
                            <strong>Ultimate winner: </strong> {{$battle->won_by}}
                        </center>
                    </div>
                    <a style="width: 70%; margin: auto;" class="game-overview game-hover mt-1 mb-5" href="{{url("/battles/{$battle->id}")}}">
                        <li class='game-hover list-group-item clearfix smaller-li'>
                            <center> {{ ucfirst($battle->name) }} <img src="{{$battle->img}}" width="40px"; style="float:right;"> </center>
                        </li></a>
                @endforeach
            </ul>
    </div>
@endsection



