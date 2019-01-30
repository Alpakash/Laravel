@extends('layouts.app')


@section('content')
    <div class="container mt-4">

        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    <center>{{ session()->get('message') }}</center>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$games[$id-1]->name}} <img src="{{$games[$id-1]->img}}" width="40px" style="margin-left:5px;"></div>
                    <div class="card-body">

                        <form action="{{url('/battles')}}/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Battle Name</label>

                                    <input type="text" class="form-control mt-2" name="name" placeholder="Write a cool battle name.." value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="players">Select between <strong>{{$games[$id-1]->min_players}}</strong> and <strong>{{$games[$id-1]->max_players}}</strong> players</label>
                                    <select class="selectpicker form-control" multiple data-live-search="true" name="user_id[]" required>
                                        <!-- Execute all usernames out of the users table -->
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach

                                        @foreach($temp_users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="number" name="game_id" value="{{$id}}" hidden>
                                <input type="number" name="battle_img" value="{{$games[$id-1]->battle_img}}" hidden>
                                <div class="col-md-4 mt-4">
                                    <input type="submit" class="center-block btn btn-success" value="Create Battle">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


