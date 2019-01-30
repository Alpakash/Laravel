@extends('layouts.app')



@section('content')
    <div class="col-md-12">
        <div class="card" style="background-image: url(https://fm.cnbc.com/applications/cnbc.com/resources/img/editorial/2018/03/15/105067468-Screen-Shot-2018-03-15-at-8.46.23-AM.1910x1000.jpg);background-size: cover;background-position: center 65%;">
            <div class="text-white text-center d-flex align-items-center px-5 my-4">
                <h1 class="card-title pt-3 mb-5 font-bold"><strong>People change all the time</strong></h1>
                <p class="mx-5 mb-5 d-none d-md-block">My theory on life is that life is beautiful. Life doesn't change. You have a day, and a night, and a month, and a year. We people change - we can be miserable or we can be happy. It's what you make of your life.
                </p>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit your profile</div>
                    <div class="card-body">

                        <form action="{{url('users')}}/{{$user->id}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>

                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{$user->email}}">
                                </div>
                                <div class="col-md-4 mt-4">
                                <input type="submit" class="center-block btn btn-success" value="Edit profile">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection