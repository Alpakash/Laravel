@extends('layouts.dashboard')
@section('content')
    @include('layouts.sidebar')
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <!-- Heading -->
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 d-flex align-items-center">
                        Account details
                    </h4>
                    <a href='javascript:history.back()' class="btn bg-white text-home-blue no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                        <i class="fas fa-arrow-left"></i>
                        Terug
                    </a>
                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-3 mb-4 h-100">

                    <!--Card-->
                    <div class="card  account-card">

                        <!--Card content-->
                        <div class="card-body d-flex justify-content-between align-items-center flex-column">
                            <div class="text-center d-flex flex-column">
                                <img src="{{asset('img/avatars/pf.png')}}" class="img-fluid" alt="Responsive image" width="150px">
                                <small class="mt-3">{{($user->Role->role == 'User') ? 'Deelnemer' : $user->Role->role  }}</small>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route("admin.$name.edit", $user->id) }}" class="btn bg-home pt-2 pb-2 mt-4">
                                    wijzigen
                                </a>
                            </div>
                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-9">

                    <!--Card-->
                    <div class="card  account-card">
                        <!--Card content-->
                        <div class="card-body">
                            <div class="d-grid grid-column-2 account-info">
                                <div class="grid-item p-2 pt-3 font-weight-bold">Naam</div>
                                <div class="grid-item p-2 pt-3 ">{{ $user->name }}</div>
                                <div class="grid-item p-2 pt-3 font-weight-bold">Achternaam</div>
                                <div class="grid-item p-2 pt-3">{{ $user->lastName }}</div>
                                <div class="grid-item p-2 pt-3 font-weight-bold">Email</div>
                                <div class="grid-item p-2 pt-3">{{ $user->email }}</div>
                                <div class="grid-item p-2 pt-3 font-weight-bold">Geactiveerd</div>
                                <div class="grid-item p-1 d-flex flex-row align-items-center">
                                    <span class="checkIcon checkIcon{{ ($user->email_verified_at)? 'Green' : 'Red' }} round-btn">
                                        <a class="btn d-flex justify-content-center align-items-center p-0">
                                            <i class="fas fa-{{ ($user->email_verified_at)? 'check' : 'times' }}"></i>
                                        </a>
                                    </span>
                                </div>
                                <div class="grid-item p-2 pt-3 font-weight-bold">Permissie</div>
                                <div class="grid-item p-2 pt-3">{{($user->Role->role == 'User') ? 'Deelnemer' : $user->Role->role  }}</div>
                            </div>

                        </div>

                        @if($user->verified !== 1)
                            <div class="card-footer bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="grid-item p-2 pt-3">
                                        <small>
                                            <i class="fas fa-exclamation"></i>
                                            Merk op dat gebruiker zijn/haar account nog niet heeft geactiveerd. <br />
                                            Klik op <b>verzend mail</b> om een mail te laten versturen met activeer link.
                                        </small>
                                    </div>
                                    <div class="grid-item p-2 pt-3 ">
                                        <form method="get" action="{{ route('verification.resend') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{ $user->email }}" />
                                            <input type="hidden" name="id" value="{{ $user->id }}" />
                                            <button type='submit' class="btn bg-home-brown pt-2 pb-2 ">
                                                <i class="fas fa-envelope"></i> send mail
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->

        </div>

    </main>

@endsection