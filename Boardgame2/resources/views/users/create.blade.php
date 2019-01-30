@extends('layouts.app')



@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a temporary user</div>
                    <div class="card-body">

                        <form action="{{url('users')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name">Name</label>

                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{old('email')}}" required>
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