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
                        <li><a href="{{ route('admin') }}" class="text-black-50">/ Dashboard</a></li>
                        <li><a href="" >/ Gebruikers</a></li>
                    </ul>
                    <div class="d-flex">
                        <a href='{{ route('admin.add') }}' class="btn bg-white btn-home-hover text-black-50 no-box-shadow p-2 pl-3 pr-3 no-radius" style="border: 1px solid #ababab;">
                            <i class="fas fa-plus"></i>
                            Deelnemer
                        </a>
                        <a href="{{ route('excel.users', $roleid) }}" class="btn bg-white btn-home-hover text-black-50 no-box-shadow p-2 pl-3 pr-3 no-radius" style="border: 1px solid #ababab;">
                            <i class="fas fa-upload"></i>
                            export
                        </a>
                        <a href='javascript:history.back()' class="btn bg-white text-home-blue btn-home-hover no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
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
                            @include('admin.users.layout.table', ['name' => $name])

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