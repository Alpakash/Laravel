@extends('layouts.dashboard')

@section('content')
    @include('layouts.sidebar')
    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">

            <div class="card mb-4 wow fadeIn mt-4 bg-transparent no-box-shadow" style="border-bottom: 1px solid  white;">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 d-flex align-items-center text-dark">
                        Gegevens
                    </h4>

                </div>

            </div>
            <!--Grid row-->
            <div class="row animated fadeIn mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 mt-lg-4 mt-md-4 mt-5">
                    <div class="card d-flex flex-column">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-end align-items-center w-100">
                                <span class="header-wrap d-flex justify-content-end align-items-center box-shadow">
                                    <i class="fas fa-users"></i>
                                </span>
                                <span class="font-weight-bold text-black-50" style="font-size: 30px;">{{ count($users) }}</span>
                            </div>
                            <hr class="w-100 mb-3 " />
                            <span class="header-body">
                                Deelnemers
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 mt-lg-4 mt-md-4 mt-5">
                    <div class="card d-flex flex-column">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-end align-items-center w-100">
                                <span class="header-wrap d-flex justify-content-end align-items-center box-shadow" style="background: #34ac54;">
                                    <i class="fas fa-gavel"></i>
                                </span>
                                <span class="font-weight-bold text-black-50" style="font-size: 30px;">2</span>
                            </div>
                            <hr class="w-100 mb-3 " />
                            <span class="header-body">
                                Judges
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 mt-lg-4 mt-md-4 mt-5">
                    <div class="card d-flex flex-column">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-end align-items-center w-100">
                                <span class="header-wrap d-flex justify-content-end align-items-center box-shadow" style="background: #bf8f03;">
                                    <i class="fas fa-toolbox"></i>
                                </span>
                                <span class="font-weight-bold text-black-50" style="font-size: 30px;">1</span>
                            </div>
                            <hr class="w-100 mb-3 " />
                            <span class="header-body">
                                Admin
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 mt-lg-4 mt-md-4 mt-5">
                    <div class="card d-flex flex-column">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex justify-content-end align-items-center w-100">
                                <span class="header-wrap d-flex justify-content-end align-items-center box-shadow" style="background: #e13013;">
                                    <i class="fas fa-store-alt"></i>
                                </span>
                                <span class="font-weight-bold text-black-50" style="font-size: 30px;">4</span>
                            </div>
                            <hr class="w-100 mb-3 " />
                            <span class="header-body">
                                Winkels
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!-- Heading -->
            <div class="card mb-4 animated  fadeIn mt-4">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 d-flex align-items-center text-home-blue">
                        <a href="#" target="_blank">laatst toegevoegde deelnemers</a>
                    </h4>
                    <div class="d-flex">
                        <a href="{{ route('admin.add') }}" class="btn bg-white btn-home-hover mr-3 text-black-50 btn-sm my-0 p no-radius border-light no-box-shadow" >
                            <i class="fas fa-plus"></i>
                            Deelnemer
                        </a>
                    </div>


                </div>

            </div>
            <!-- Heading -->


            <!--Grid row-->
            <div class="row animated  fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <div class="table-responsive oTable">
                                <table class="table" style="border-collapse: initial !important;">
                                    <thead>
                                    <tr>
                                        <th scope="col">voornaam</th>
                                        <th scope="col">achternaam</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Geactiveerd</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    @foreach($users as $user)
                                        <tbody>
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->lastName }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <span class="checkIcon checkIcon{{ ($user->verified == 1)? 'Green' : 'Red' }} round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-{{ ($user->verified == 1)? 'check' : 'times' }}"></i>
                                                    </a>
                                                </span>
                                            </td>
                                            <td class="d-flex justify-content-start">
                                                <span class="pencilIcon round-btn mr-3">
                                                    <a href="{{route('admin.users', $user->id)}}" class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </span>
                                                <span class="trashIcon round-btn">
                                                    <a href="{{url('/admin/users')}}" class="btn d-flex justify-content-center align-items-center p-0">
                                                       <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </span>

                                            </td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                        <div class="card-footer bg-white text-right">
                            <a href='{{route('admin.users')}}' class="btn bg-home btn-sm p no-radius text-white" >
                                <i class="fas fa-users mr-2"></i>
                                <span>Meer deelnemers</span>
                            </a>
                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


        </div>
    </main>
    <!--Main layout-->

@endsection