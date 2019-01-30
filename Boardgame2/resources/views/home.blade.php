@extends('layouts.app')

@section('content')
{{-- Profile page jumbotron at the top --}}
    <div class="mb-4">
        <div class="col-md-12">
            <div class="card" style="background-image: url(https://steamcdn-a.akamaihd.net/steamcommunity/public/images/items/207080/a7f7b73ec733c86efcd36037730484a993767d95.jpg);background-size: cover;">
                <div class="text-white text-center align-items-center px-4 my-4">
                    <div>
                        <h1 class="card-title pt-3 mb-5 font-bold"><strong>Profile Page</strong></h1>
                        <p class="mx-5 mb-5">Keep a cool head and maintain a low profile. Never take the lead - but aim to do something big.
                            Every so often you have to increase your profile so you can let it lower again, like a balloon.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Card with Basic information about the users --}}
            <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Basic information</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="cardBorder">
                            <div class="profileIcon"> <i class="fas fa-id-card"></i> </div>

                            <div class="profileLabel"><strong>Name:</strong><p> {{ $username }} </p></div>
                        </div>

                        <div class="cardBorder">
                            <div class="profileIcon"> <i class="fas fa-trophy"></i></div>
                            <div class="profileLabel"><strong>Last Game:</strong><p> @isset($lastPlayedGame) {{$lastPlayedGame}} @endisset</p></div>
                        </div>

                        <div class="cardBorder">
                            <div class="profileIcon"> <i class="fas fa-list-alt"></i> </div>
                            <div class="profileLabel"> <strong>Battles:</strong><p> @isset($battlesPlayed) {{$battlesPlayed}} battles played @endisset</p></div>
                        </div>

                        <div class="cardBorder">
                            <div class="profileIcon"> <i class="fas fa-forward"></i> </div>
                            <div class="profileLabel">
                                <strong>Winning rate:</strong><p> @isset($winningRatio) {{$battlesWon}}  of  {{$battlesPlayed}}  victories /  {{$winningRatio}}% @endisset</p>
                            </div>
                        </div>
                        <div class="cardBorder">
                            <div class="profileIcon"> <i class="fas fa-plus-square"></i> </div>
                            <div class="profileLabel">
                                <strong>Account created:</strong><p> {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d-m-Y') }}</p>
                            </div>
                        </div>

                        <center><a href='{{ url('/games') }}'><button class="btn btn-danger form-control mt-3 mb-2">Watch games</button></a></center>
                            <center><a href='{{ url('/battles') }}'><button class="btn btn-success form-control">Watch battles</button></a></center>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
