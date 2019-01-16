<div class="container">
    <center><h1 class="mt-4" style="color: #fff;">Ronde 1</h1></center>
    <div class="row">

        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
            {{-- for loop het aantal tafels met 4 spelers--}}
            @for($i=0; $i < $totalTables; $i++)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <a href="/score/{{ $i }}" class="tableLinks">
                            <div class="card-header"><center><strong>Tafel {{ $i + 1 }}</strong></center></div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Naam</th>
                                        <th scope="col">Punten</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(array_has($usersPerTable, $i.'.0'))
                                        <tr>
                                            <td>{{$usersPerTable[$i][0]->name}}</td>
                                            <td>{{$usersPerTable[$i][0]->tournament_points}}</td>
                                        </tr>
                                        @endif

                                    @if(array_has($usersPerTable, $i.'.1'))
                                        <tr>
                                            <td>{{$usersPerTable[$i][1]->name}}</td>
                                            <td>{{$usersPerTable[$i][1]->tournament_points}}</td>
                                        </tr>
                                    @endif

                                    @if(array_has($usersPerTable, $i.'.2'))
                                        <tr>
                                            <td>{{$usersPerTable[$i][2]->name}}</td>
                                            <td>{{$usersPerTable[$i][2]->tournament_points}}</td>
                                        </tr>
                                    @endif

                                        {{-- if array has a 4th player, then get the variable--}}
                                        @if(array_has($usersPerTable, $i.'.3'))
                                        <tr>
                                            <td>{{$usersPerTable[$i][3]->name}}</td>
                                            <td>{{$usersPerTable[$i][3]->tournament_points}}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </a>
                    </div>

                </div>
            @endfor
            <a href="#"><button class="btn btn-success float-right">Volgende ronde <i class="fas fa-chevron-right"></i></button></a>


        @elseif(Auth::user()->isUser() || Auth::user()->isStores())
            <div class="col-md-3">
                <div class="card mt-4">
                    <div class="card-header"><center><strong>Tafel 1</strong></center>
                    </div>

                    <div class="card-body">
                        Non-clickable
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
