@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="p-0 "><img  src="https://upload.wikimedia.org/wikipedia/it/3/38/Carcassonne_Logo.png" width="150px" /></div>
    </div>
    <div class="row mt-1">
        <div class="col-lg-3 col-md-2 col-sm-12"></div>
        <div class="col-lg-6 col-md-8 col-sm-12 text-center p-1 bg-home box-shadow">
            <div class="form-header p-4 d-flex justify-content-center align-items-center flex-column text-white">
                <h2>Welkom</h2>
                @if(!isset($_GET['email']) && !isset($_GET['hash']))
                    <span>Ontdek wat deze applicatie jou te bieden heeft</span>
                @else
                    <span>Maak in een paar stappen account aan <b>{{ $_GET['email'] }}</b></span>
                @endif
            </div>
            <div class="form-wrap no-box-shadow bg-white p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="d-flex flex-row">
                        <div class="form-element w-100">
                            <div class="input-group mb-2 h-100">
                                <div class="input-group-prepend h-100">
                                    <div class="input-group-text">
                                        <i class="fas fa-user ft-20  text-home-blue"></i>
                                    </div>
                                </div>
                                <input type="text" name="name"  class="form-control ft-18 {{ $errors->has('name') ? ' is-invalid' : '' }} no-radius py-0 p-4"  value="{{ old('name') }}" required  placeholder="voornaam"
                                       oninvalid="this.setCustomValidity('Naam dient ingevuld te zijn')" oninput="setCustomValidity('')">
                            </div>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-element w-100">
                            <div class="input-group mb-2 h-100">
                                <div class="input-group-prepend  h-100">
                                    <div class="input-group-text">
                                        <i class="fas fa-id-card ft-20 text-home-blue"></i>
                                    </div>
                                </div>
                                <input type="text" name="lastName"  class="form-control ft-18 {{ $errors->has('lastName') ? ' is-invalid' : '' }} no-radius py-0 p-4" required  placeholder="achternaam"
                                       oninvalid="this.setCustomValidity('Achternaam dient ingevuld te zijn')" oninput="setCustomValidity('')">
                            </div>
                            <small class="text-danger">{{ $errors->first('lastName') }}</small>
                        </div>
                    </div>
                    @if(!isset($_GET['email']) && !isset($_GET['hash']))
                    <div class="form-element">
                        <label class="sr-only" >email</label>
                        <div class="input-group mb-2  h-100">
                            <div class="input-group-prepend  h-100">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope ft-20 text-home-blue"></i>
                                </div>
                            </div>
                            <input type="email" name="email"  class="form-control ft-18 {{ $errors->has('email') ? ' is-invalid' : '' }} no-radius py-0 p-4" required  placeholder="Email"
                                   oninvalid="this.setCustomValidity('Email mag neit leeg zijn')" oninput="setCustomValidity('')">
                        </div>
                        <small class="text-danger ">{{ $errors->first('email') }}</small>
                    </div>
                    @endif

                    <div class="form-element">
                        <label class="sr-only" >wachtwoord</label>
                        <div class="input-group mb-2  h-100">
                            <div class="input-group-prepend h-100">
                                <div class="input-group-text">
                                    <i class="fas fa-unlock ft-20 text-home-blue"></i>
                                </div>
                            </div>
                            <input type="password" name="password"  class="form-control ft-18 {{ $errors->has('password') ? ' is-invalid' : '' }} no-radius py-0 p-4" required  placeholder="wachtwoord"
                                   oninvalid="this.setCustomValidity('Wachtwoord dient ingevuld te zijn')" oninput="setCustomValidity('')">
                        </div>
                        <small class="text-danger ">{{ $errors->first('password') }}</small>
                    </div>

                    <div class="form-element">
                        <label class="sr-only" >wachtwoord</label>
                        <div class="input-group mb-2  h-100">
                            <div class="input-group-prepend  h-100">
                                <div class="input-group-text">
                                    <i class="fas fa-lock ft-20 text-home-blue"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation"  class="form-control ft-18 no-radius py-0 p-4" required  placeholder="wachtwoord">
                        </div>
                    </div>
                    <div class="row " >
                        <div class="col-lg-6 col-md-6 col-sm-12 ">
                            <div class="form-element  w-100 ">
                                <div class="input-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }} ">
                                    <div class="g-recaptcha-outer">
                                        <div class="g-recaptcha-inner">
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mt-3">
                                <div class="d-flex justify-content-end w-100">
                                    <div class="d-flex">
                                        <button type="submit" class="btn bg-home btn-home-hover m-0 no-radius no-box-shadow" style="padding: 1em 4em;">
                                            {{ __('Registreer') }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="w-100 mt-2 mb-2" />
                    <div class="d-flex text-home-blue justify-content-between">
                        <div class="d-flex align-items-center" style="width: 40%">
                            <a href='/welcome' class="btn bg-white btn-home-hover text-home-blue no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                                <i class="fas fa-arrow-left"></i>
                                Home
                            </a>
                        </div>
                        <div class="d-flex text-right ">
                            <a href="/login" class="d-flex align-items-center w-100 text-right ">Al een account? log in</a>
                        </div>
                    </div>
                    <hr class="w-100 mt-2 mb-2" />
                    <div class="d-flex justify-content-center ">
                        <small>Door op <b>Regristreren</b> te drukken, gaat u accoord met de
                        <a href="">algemene voorwaarden</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-12"></div>
    </div>
</div>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('register') }}">--}}
                        {{--@csrf--}}
                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">Voornaam</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">Achternaam</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>--}}

                                {{--@if ($errors->has('lastName'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('lastName') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">Wachtwoord</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Her. wachtwoord</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">--}}
                            {{--<label class="col-md-4 control-label">Captcha</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! app('captcha')->display() !!}--}}
                                {{--@if ($errors->has('g-recaptcha-response'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('g-recaptcha-response') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
