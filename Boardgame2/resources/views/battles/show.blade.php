@extends('layouts.app')

@section('content')

<div class="container mt-4">
<h1 class="card-title text-center">Battle name: {{$battles[$id-1]->name}}</h1>
    <h4 class="text-center">Ultimate Winner:  <?php if(isset(\App\User::find($battles[$id-1]->won_by)->name)) : ?>{{\App\User::findOrFail($battles[$id-1]->won_by)->name}} <?php endif; ?></h4><br><br>



        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <div class="card pb-4">
                    <div class="card-header">{{$battles[$id-1]->name}} <br><em>{{$battles[$id-1]->played_date}}</em></div>

                    <div class="card-body">
        <form action="{{url('/battles')}}/{{$id}}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-row col-md-12">
                <div class="form-group">

                    <?php if(isset(\App\User::find($battles[$id-1]->player1)->name)) : ?>
               <center> <label for="score">{{\App\User::findOrFail($battles[$id-1]->player1)->name}}</label></center>
                <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score1}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1"><br>
                </div>
          <?php endif; ?>
                </div>

                <div class="form-group">
                    <?php if(isset(\App\User::find($battles[$id-1]->player2)->name)) : ?>

                   <center> <label for="score">{{\App\User::findOrFail($battles[$id-1]->player2)->name}}</label></center>
                    <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score2}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1">
                </div><br>
          <?php endif; ?>
                </div>
            </div>


            <div class="form-row col-md-12">
                <div class="form-group">
                    <?php if(isset(\App\User::find($battles[$id-1]->player3)->name)) : ?>
                <center><label for="score">{{\App\User::findOrFail($battles[$id-1]->player3)->name}}</label></center>
                <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score3}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1"><br>
                </div>
          <?php endif; ?>
                </div>

                <div class="form-group">
                    <?php if(isset(\App\User::find($battles[$id-1]->player4)->name)) : ?>
                <center><label for="score">{{\App\User::findOrFail($battles[$id-1]->player4)->name}}</label></center>
                <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score4}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1"><br>
                </div>
          <?php endif; ?>
            </div>
            </div>

            <div class="form-row col-md-12">
            <div class="form-group">
                <?php if(isset(\App\User::find($battles[$id-1]->player5)->name)) : ?>
                <center> <label for="score">{{\App\User::findOrFail($battles[$id-1]->player5)->name}}</label></center>
                <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score5}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1"><br>
                </div>
          <?php endif; ?>
            </div>

                <div class="form-group">
                    <?php if(isset(\App\User::find($battles[$id-1]->player6)->name)) : ?>
                    <center><label for="score">{{\App\User::findOrFail($battles[$id-1]->player6)->name}}</label></center>
                <div class="col">
            <input required type="text" class="form-control" value="{{$battles[$id-1]->score6}}" placeholder="Score" name="score[]" class="col-md-1 text-center form-control mt-1"><br>
          <?php endif; ?>

            </div>

            </div>
                <center><div class="col-md-6">
                        <label for="won_by">Select winner:</label>
                        <select class="form-control" name="won_by" required>
                            <?php if(isset(\App\User::find($battles[$id-1]->player1)->name)) : ?><option value="{{$battles[$id-1]->player1}}">{{\App\User::findOrFail($battles[$id-1]->player1)->name}}</option>
                            <?php if(isset(\App\User::find($battles[$id-1]->player2)->name)) : ?><option value="{{$battles[$id-1]->player2}}">{{\App\User::findOrFail($battles[$id-1]->player2)->name}}</option>
                            <?php if(isset(\App\User::find($battles[$id-1]->player3)->name)) : ?><option value="{{$battles[$id-1]->player3}}">{{\App\User::findOrFail($battles[$id-1]->player3)->name}}</option>
                            <?php if(isset(\App\User::find($battles[$id-1]->player4)->name)) : ?><option value="{{$battles[$id-1]->player4}}">{{\App\User::findOrFail($battles[$id-1]->player4)->name}}</option>
                            <?php if(isset(\App\User::find($battles[$id-1]->player5)->name)) : ?><option value="{{$battles[$id-1]->player5}}">{{\App\User::findOrFail($battles[$id-1]->player5)->name}}</option>
                            <?php if(isset(\App\User::find($battles[$id-1]->player6)->name)) : ?><option value="{{$battles[$id-1]->player6}}">{{\App\User::findOrFail($battles[$id-1]->player6)->name}}</option>
                            <?php endif; ?> <?php endif; ?> <?php endif; ?> <?php endif; ?> <?php endif; ?> <?php endif; ?>
                        </select>
                        <input type="number" name="id" value="{{$id}}" hidden><br>
                        <input type="submit" value="Submit scores" class="btn btn-primary">
                            </form>
                    </div></center>
            </div>





            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
