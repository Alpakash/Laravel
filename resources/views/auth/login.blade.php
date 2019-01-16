@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="p-0"><img src="https://upload.wikimedia.org/wikipedia/it/3/38/Carcassonne_Logo.png" width="150px" /></div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3 col-md-2 col-sm-12"></div>
        <div class="col-lg-6 col-md-8 col-sm-12 text-center p-1 bg-home box-shadow">
            <div class="form-header p-4 d-flex justify-content-center align-items-center flex-column text-white">
                <h2>Inloggen</h2>
            </div>
            <div class="form-wrap no-box-shadow bg-white p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-element">
                        <label class="sr-only" >Email</label>
                        <div class="input-group mb-2  h-100">
                            <div class="input-group-prepend mr-2 h-100">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope ft-20 text-home-blue"></i>
                                </div>
                            </div>
                            <input type="email" name="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}  ft-18 no-radius py-0 p-4" value="{{ old('email') }}" required  placeholder="Email"
                                   oninvalid="this.setCustomValidity('Email dient ingevuld te zijn')" oninput="setCustomValidity('')">
                        </div>
                        <small class="text-danger pl-4">{{ $errors->first('email') }}</small>
                    </div>
                    <div class="form-element">
                        <label class="sr-only" >Wachtwoord</label>
                        <div class="input-group mb-2  h-100">
                            <div class="input-group-prepend mr-2 h-100">
                                <div class="input-group-text">
                                    <i class="fas fa-lock ft-20 text-home-blue"></i>
                                </div>
                            </div>
                            <input type="password" name="password"   class="form-control ft-18 {{ $errors->has('password') ? ' is-invalid' : '' }} no-radius py-0 p-4" required  placeholder="Wachtwoord"
                                   oninvalid="this.setCustomValidity('Wachtwoord dient ingevuld te zijn')" oninput="setCustomValidity('')">
                        </div>
                        <small class="text-danger pl-4">{{ $errors->first('password') }}</small>
                    </div>
                    @if(Session::has('msg-login'))
                    <div class="form-element text-left w-100">
                        {!! session('msg-login') !!}
                    </div>
                    @endif
                    <div class="form-group mt-4">
                        <div class="d-flex justify-content-between w-100">
                            <div class="d-flex align-items-center text-left">
                                <a class="p-1" href="{{ route('password.request') }}">
                                    {{ (Session::has('msg-login')) ? 'wachtwoord aanvragen' : 'wachtwoord vergeten?'   }}
                                </a>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn bg-home btn-home-hover m-0 no-radius no-box-shadow" style="padding: 1em 4em;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr class="w-100 mt-4 mb-4" />
                    <div class="d-flex text-home-blue justify-content-between">
                        <div class="d-flex align-items-center" style="width: 40%">
                            <a href='/welcome' class="btn bg-white btn-home-hover text-home-blue no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                                <i class="fas fa-arrow-left"></i>
                                Home
                            </a>
                        </div>
                        <div class="d-flex text-right ">
                            <a href="/register" class="d-flex align-items-center w-100 text-right ">Nog geen account? Registreer nu</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-12"></div>
    </div>
</div>
@endsection
