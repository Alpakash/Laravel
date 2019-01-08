@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="p-0 "><img  src="https://upload.wikimedia.org/wikipedia/it/3/38/Carcassonne_Logo.png" width="150px" /></div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-2 col-sm-12"></div>
            <div class="col-lg-6 col-md-8 col-sm-12 text-center p-1 bg-home box-shadow">
                <div class="form-header p-4 d-flex justify-content-center align-items-center flex-column text-white">
                    <h2>Wachtwoord resetten</h2>
                </div>
                <div class="form-wrap no-box-shadow bg-white p-4">
                    <form method="POST" action="{{ route('password.email') }}">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @csrf
                        <div class="d-flex flex-column justify-content-center m-2">
                            <i class="fas fa-unlock-alt m-2" style="font-size: 40px;color: #41bf5d;"></i>
                            <span class="p-2">Oops je bent je wachtwoord vergeten. Voer je email-addres in en klik op de knop
                                <b>Verzend mail</b> om wachtwoord te resetten</span>
                        </div>
                        <div class="form-element  p-2">
                            <label class="sr-only" >email</label>
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
                        <div class="form-group m-0 p-0">
                            <div class="d-flex justify-content-between w-100">
                                <div class="d-flex align-items-center text-left p-2 w-100">
                                    <a href='/login' class="btn w-100 bg-white text-home-blue btn-home-hover m-0 no-radius no-box-shadow" style="border: 1px solid #1c5ea4;">
                                        <i class="fas fa-arrow-left"></i>
                                        {{ __('Login') }}
                                    </a>
                                </div>
                                <div class="d-flex p-2 w-100">
                                    <button type="submit" class="btn w-100 bg-home btn-home-hover m-0 no-radius no-box-shadow shadow-hover" style="padding: 1em 4em;">
                                        {{ __('Verzend mail') }}
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
