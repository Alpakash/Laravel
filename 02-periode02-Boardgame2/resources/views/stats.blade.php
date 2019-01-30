@extends('layouts.app')

@section('content')
    {{-- Profile page jumbotron at the top --}}
    <div class="mb-4">
        <div class="col-md-12">
            <div class="card" style="background-image: url(https://images5.alphacoders.com/389/389431.jpg);background-size: cover;">
                <div class="text-white text-center align-items-center px-4 my-4">
                    <div>
                        <h1 class="card-title pt-3 mb-5 font-bold"><strong>Statistics fam</strong></h1>
                        <p class="mx-5 mb-5">Two plus two is four, minus one that's three, quick maths
                            Everyday man's on the block, smoke trees
                            See your girl in the park, that girl is a uckers
                            When the ting went quack-quack-quack, you man were ducking (you man ducked).
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
                    <div class="card-header">Insane stats of user: {{$username}}</div>
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

                            <center><a href='{{ url('/players') }}'><button class="btn btn-primary form-control mt-3 mb-2">Back to players</button></a></center>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
