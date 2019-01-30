@extends('layouts.app')

@section('content')

      <div class="col-md-12">
            <div class="card" style="background-image: url(https://wallpaperstudio10.com/static/wpdb/wallpapers/1920x1080/177315.jpg);background-size: cover; background-position: center">
                <div class="text-white text-center align-items-center px-5 my-4">
                        <h1 class="card-title pt-3 mb-5 font-bold"><strong>Don't hate the player hate the game</strong></h1>
                        <p class="mx-5 mb-5 d-none d-md-block">Finding good players is easy. Getting them to play as a team is another story.
                            No team in the world depends on one or two players. The team always plays to win.
                        </p>
                    </div>
                </div>
            </div>


      <div class="container mt-4 mb-4">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <center>{{ session()->get('message') }}</center>
            </div>
        @endif


        <div class="row justify-content-center">

            <div class="col-md-8">
                <a href="{{url('/users/create')}}"><button style="margin-top: -5px;" class="btn btn-sm btn-success mb-3"><i class="fa fa-plus"></i> Add Temporary Player</button></a>

                <div class="card">
                    <div class="card-header">{{ count($users) + count($temp_users) }} player's are available in Boardgame 2.0</div>

                    <div class="card-body">
                        <ol>
                            @foreach($temp_users as $user)
                                <div>
                                    <li style="text-align: center; list-style-type: none; margin-left: -30px;" class="border py-3 px-3 mb-3">
                                        {{$user->name}}


                                    <div class="float-left">
                                        <span class="badge badge-light ml-4 mr-4">Temp User</span>
                                    </div>
                                    <div class="float-right">
                                        <form style="display: inline-block;" action="temp_users/{{$user->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button style="margin-top: -5px;" class="d-none d-sm-block btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                    </li>
                                </div>
                                @endforeach

                            @foreach($users as $user)
                                <div>
                                <a href="{{url('/stats')}}/{{$user->id}}"><li style="text-align: center; list-style-type: none; margin-left: -30px;" class="border py-3 px-3 mb-3">
                                         {{$user->name}}
                                </a>


                                    <div class="float-left">
                                    <a href="users/{{$user->id}}/edit">
                                        <button style="margin-top: -5px;" class="btn btn-sm btn-outline-warning mr-2"><i class="far fa-edit"></i> Edit</button>
                                    </a>
                                    </div>
                                    <div class="float-right">
                                        <form style="display: inline-block;" action="{{ route('users.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                        <button style="margin-top: -5px;" class="d-none d-sm-block btn btn-sm btn-danger float-right"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>



                                </li>

                                </div>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection