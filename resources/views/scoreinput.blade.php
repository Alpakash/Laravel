@extends('layouts.app')
@section('content')
    <?php
$usersOnTable = count($usersPerTable[$table_id]);
    ?>

    <div class="container">


        <center><h1 class="pt-4 mb-5">Tafel {{$usersPerTable[$table_id][0]->table_id}} / Ronde 1</h1></center>
        <form action="/gamePoints" method="post">
            @csrf
        <div class="row">

        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())

        @for($i=0; $i < $usersOnTable ; $i++)
            <br>

                <div class="col-md-6 mb-5">
                    <div class="card">
                        <div class="card-header"><center><strong>{{$usersPerTable[$table_id][$i]->name}} {{$usersPerTable[$table_id][$i]->lastName}}
                                </strong></center>
                        </div>

                        <div class="card-body">

                                <div class="form-group col-md-12">
                                    <input type="number" class="form-control" value="{{$usersPerTable[$table_id][$i]->game_points}}" placeholder="Game points" name="{{$usersPerTable[$table_id][$i]->id}}">

                                </div>

                        </div>
                    </div>
                </div>
            @endfor


                </div>
            <input type="submit" value="SCORES DOORVOEREN" class="btn btn-success">

        </form>
            </div>



        @endif

    </div>

    </div>
    <center><a href="{{url('/scores')}}"><button class="mb-4 btn btn-primary"><i class="fas fa-angle-left"></i> naar tafels</button></a></center>
@endsection


{{-- 1. Pagina maken waar alleen judge en admin bij kan->middleware('judge/admin') }}


{{-- 2. Alle tafels weergeven van back-end (dus de DD's visueel maken) --}}


{{-- 3. De tafel aanklikken en naar een route gaan met tafel-id --}}


{{-- 4. geef de spelers inputs weer met create route voor game-points ---}}


{{-- 5. redirect naar tafel overzicht --}}


{{-- 6. In tafeloverzicht, geef de punten weer met username in de read route (klik volgende tafel)}}


{{-- 7. Als alle tafels zijn ingevuld, klikt judge op knop "volgende ronde" --}}