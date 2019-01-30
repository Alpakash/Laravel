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
                    <h2>Email verificatie</h2>
                    @if(Auth::check())
                        <span>Email verificatie voor <b> {{ Auth::user()->email }} </b></span>
                    @endif
                </div>
                <div class="form-wrap no-box-shadow bg-white p-4">
                    <div class="d-flex flex-column justify-content-center">
                        <i class="fas fa-envelope-open m-2" style="font-size: 40px;color: #41bf5d;"></i>
                        <h1 class="p-2">Hallo, {{(Auth::check())? Auth::user()->name : ''}}</h1>
                        <span class="p-2">We zijn er bijna. Er is een mailtje naar jouw gestuurd met een activeer link.</span>
                        <hr class="w-100 mt-4 mb-4" />
                        <span class="p-2">Heb je geen mailtje ontvangen? Klik dan op de knop <b>Verzend mail</b> om een mailtje te laten onvangen.</span>
                        <div class="d-flex justify-content-between">
                            <a href="{{url('/welcome')}}" class="w-100 btn bg-white btn-home-hover text-home-blue no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                                <i class="fas fa-arrow-left"></i>
                                Home
                            </a>
                            <a href="{{ route('verification.resend') }}" class="w-100 btn bg-home btn-home-hover no-radius no-box-shadow text-white p-2" >
                                {{ __('verzend mail') }}
                            </a>
                        </div>
                        <span class="mt-3 font-weight-bold">Bedankt voor jouw deelname!</span>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-12"></div>
        </div>
    </div>
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

                {{--<div class="card-body">--}}


                    {{--{{ __('Before proceeding, please check your email for a verification link.') }}--}}
                    {{--{{ __('If you did not receive the email') }}, {{ __('click here to request another') }}</a>.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
