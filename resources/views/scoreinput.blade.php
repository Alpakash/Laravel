@extends('layouts.app')
@section('content')
    <div class="container">
        <center><h1 class="mt-4">Tafel 1 / Ronde 1</h1></center>
    <div class="row">
        @if(Auth::user()->isAdmin() || Auth::user()->isJudge())
            <div class="col-md-6">
                <div class="card mt-4">
                     <div class="card-header"><center><strong>User 1</strong></center>
                        </div>

                        <div class="card-body">
                            <form action="">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Game points">
                                </div>
                            </form>

                        </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-4">
                     <div class="card-header"><center><strong>User 2</strong></center>
                        </div>

                        <div class="card-body">
                            <form action="">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Game points">
                                </div>
                            </form>

                        </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-4">
                     <div class="card-header"><center><strong>User 3</strong></center>
                        </div>

                        <div class="card-body">
                            <form action="">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Game points">
                                </div>
                            </form>

                        </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="card mt-4">
                     <div class="card-header"><center><strong>User 4</strong></center>
                        </div>

                        <div class="card-body">
                            <form action="">
                                <div class="form-group col-md-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Game points">
                                </div>
                            </form>

                        </div>

                </div>
            </div>



        @endif
    </div>
</div>
@endsection

{{-- 1. Pagina maken waar alleen judge en admin bij kan->middleware('judge/admin') }}


{{-- 2. Alle tafels weergeven van back-end (dus de DD's visueel maken) --}}


{{-- 3. De tafel aanklikken en naar een route gaan met tafel-id --}}


{{-- 4. geef de spelers inputs weer met create route voor game-points ---}}


{{-- 5. redirect naar tafel overzicht --}}


{{-- 6. In tafeloverzicht, geef de punten weer met username in de read route (klik volgende tafel)}}


{{-- 7. Als alle tafels zijn ingevuld, klikt judge op knop "volgende ronde" --}}