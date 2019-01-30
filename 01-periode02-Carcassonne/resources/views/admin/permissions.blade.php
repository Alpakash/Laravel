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
                            <a href="#" class="ft-20 text-black-50">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li><a href="{{ route('admin') }}" class="text-black-50">/ Dashboard</a></li>
                        <li><a href="" >/ Gebruikers</a></li>
                    </ul>
                    <div class="d-flex">
                        <a href='{{ route('admin.add') }}' class="btn bg-white btn-home-hover text-black-50 no-box-shadow p-2 pl-3 pr-3 no-radius" style="border: 1px solid #ababab;">
                            <i class="fas fa-plus"></i>
                            Deelnemer
                        </a>
                        <a href='javascript:history.back()' class="btn bg-white text-home-blue btn-home-hover no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                            <i class="fas fa-arrow-left"></i>
                            Terug
                        </a>
                    </div>

                </div>

            </div>
            <div class="row animated fadeIn">
                <div class="col-12">
                    <h4>Wijzig permissie van gebruikers</h4>
                    <hr />
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
                                    <table id="userTable" class="table  mt-3" width="100%" style="border-collapse: initial !important;" >
                                        <thead>
                                        <tr>
                                            <th scope="col">voornaam</th>
                                            <th scope="col">achternaam</th>
                                            <th scope="col">email</th>
                                            <th scope="col">Permissie</th>
                                            <th scope="col">Actie</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <form action="{{ route('admin.post.permissions', $user->id) }}" method="post">
                                                    @csrf
                                                    <td>{{ $user['name'] }}</td>
                                                    <td>{{ $user['lastName'] }}</td>
                                                    <td>{{ $user['email'] }}</td>
                                                    <td>
                                                        <select name="role_id" class="custum-select">
                                                            <option {{ ($user->Role->role == 'User') ? 'selected' : '' }} value="3">Deelnemer</option>
                                                            <option {{ ($user->Role->role == 'Judge') ? 'selected' : '' }} value="2">Judge</option>
                                                        </select>
                                                    </td>
                                                    <td class="d-flex justify-content-start">
                                                        <button type="submit"  class="btn d-flex justify-content-center align-items-center btn-sm btn-primary">
                                                            wijzig
                                                        </button>
                                                    </td>
                                                </form>
                                            </tr>

                                        @endforeach
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