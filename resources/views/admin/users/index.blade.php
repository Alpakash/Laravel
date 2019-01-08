@extends('layouts.dashboard')
@section('content')
    @include('layouts.sidebar')
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <!-- Heading -->
            <div class="card mb-4 bg-transparent no-box-shadow">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between align-items-center p-0 pt-3">

                    <ul class="quick-nav">
                        <li>
                            <a href="" class="ft-20 text-black-50">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li><a href="/admin" class="text-black-50">/ Dashboard</a></li>
                        <li><a href="" >/ Deelnemer</a></li>
                    </ul>
                    <div class="d-flex">
                        <a href='/admin/add' class="btn bg-white btn-home-hover text-black-50 no-box-shadow p-2 pl-3 pr-3 no-radius" style="border: 1px solid #ababab;">
                            <i class="fas fa-plus"></i>
                            Deelnemer
                        </a>
                        <a href='/admin/deelnemer/create' class="btn bg-white btn-home-hover text-black-50 no-box-shadow p-2 pl-3 pr-3 no-radius" style="border: 1px solid #ababab;">
                            <i class="fas fa-upload"></i>
                            export
                        </a>
                        <a href='/admin' class="btn bg-white text-home-blue btn-home-hover no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                            <i class="fas fa-arrow-left"></i>
                            Terug
                        </a>
                    </div>

                </div>

            </div>
            <!-- Heading -->
            <!--Grid row-->
            <div class="row animated fadeIn">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <!--Card-->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">
                            <div class="w-100">
                                {{--class=""  width="100%" style="border-collapse: initial !important;"--}}
                                <table id="userTable" class="table  mt-3" width="100%" style="border-collapse: initial !important;" >
                                    <thead>
                                    <tr>
                                        <th scope="col">voornaam</th>
                                        <th scope="col">achternaam</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Geactiveerd</th>
                                        <th scope="col">Actie</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

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
                                                    <a href="/admin/deelnemers/{{$user->id}}" class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </span>
                                                <span class="trashIcon round-btn">
                                                    <a href="/deelnemers" class="btn d-flex justify-content-center align-items-center p-0">
                                                       <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </span>

                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td>Naam</td>
                                            <td>Achternaam</td>
                                            <td>email</td>
                                            <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                            </td>
                                            <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                                <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                            </td>
                                        </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Naam</td>
                                        <td>Achternaam</td>
                                        <td>email</td>
                                        <td>
                                               <span class="checkIcon checkIconGreen round-btn">
                                                    <a class="btn d-flex justify-content-center align-items-center p-0">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                </span>
                                        </td>
                                        <td class="d-flex justify-content-start">
                                                   <span class="pencilIcon round-btn mr-3">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                    </span>
                                            <span class="trashIcon round-btn">
                                                        <a href="" class="btn d-flex justify-content-center align-items-center p-0">
                                                           <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                </span>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->


            </div>
            <!--Grid row-->
        </div>

    </main>

@endsection