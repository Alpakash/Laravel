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
                       <li><a href="">/ Toevoegen</a></li>
                   </ul>
                    <a href='javascript:history.back()' class="btn bg-white text-home-blue no-box-shadow p-2 no-radius" style="border: 1px solid #1c5ea4;">
                        <i class="fas fa-arrow-left"></i>
                        Terug
                    </a>
                </div>

            </div>
            <!-- Heading -->

            <!--Grid row-->
            <div class="row wow fadeIn">
                <div class="col-md-12 ">
                    <form method="POST" action="{{ route('admin.post.add') }}">
                        @csrf
                        <div class="d-flex flex-column box-shadow">
                            <div class="d-flex flex-row">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <div class="d-flex flex-column justify-content-center align-items-center form-header-home">
                                         <span class="ft-30">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="ft-20 mt-2">
                                            gebruiker toevoegen
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 p-0 form-right-header d-flex justify-content-end align-items-center">
                                    <div class="d-flex">
                                        <button type="submit" class="btn bg-home pt-2 pb-2 pr-4 pl-4 mr-4 no-border">
                                            <i class="fas fa-user-plus mr-2"></i>Aanmaken
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row bg-white">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0 form-content-wrap d-flex align-items-center">
                                    <div class="d-flex p-4 ">
                                        <span class="font-weight-bold">Email</span>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 p-2 form-content-wrap">
                                    <div class="d-flex p-4">
                                        <div class="input-group w-75">
                                            {{--<div class="input-group-prepend">--}}
                                                {{--<div class="input-group-text no-radius bg-home text-white pl-3 pr-3">--}}
                                                    {{--<i class="fas fa-envelope"></i>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <input type="text" name="email" class="form-control py-0 no-radius h-3 ft-15" value="{{ old('email') }}" required placeholder="email-adres"
                                                   oninvalid="this.setCustomValidity('Email dient ingevuld te zijn')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                    <small class="text-danger pl-4">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row bg-white">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0 form-content-wrap d-flex align-items-center">
                                    <div class="d-flex p-4">
                                      <span class="font-weight-bold">Permissie</span>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 p-2 form-content-wrap d-flex align-items-center">
                                    <div class="d-flex pl-4 pr-4 pt-2 pb-2 flex-row w-100">
                                        <select name="role_id" class="custum-select">
                                            <option selected value="3">Deelnemer</option>
                                            <option value="2">Judge</option>
                                        </select>
                                        {{--<div class="d-flex flex-column justify-content-center w-100">--}}
                                            {{--<span class="font-weight-bold">Deelnemer</span>--}}
                                            {{--<label class="d-flex mt-1">--}}
                                                {{--<input  class="label__checkbox" name="user" type="checkbox" checked/>--}}
                                                {{--<span class="label__text">--}}
                                                    {{--<span class="label__check">--}}
                                                    {{--<i class="fa fa-check icon"></i>--}}
                                                    {{--</span>--}}
                                                {{--</span>--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="d-flex flex-column justify-content-center w-100">--}}
                                            {{--<span class="font-weight-bold">Judge</span>--}}
                                            {{--<label class="d-flexs mt-1">--}}
                                                {{--<input  class="label__checkbox" name="judge" type="checkbox"  />--}}
                                                {{--<span class="label__text">--}}
                                                    {{--<span class="label__check">--}}
                                                    {{--<i class="fa fa-check icon"></i>--}}
                                                    {{--</span>--}}
                                                {{--</span>--}}
                                             {{--</label>--}}
                                        {{--</div>--}}
                                    </div>
                                 </div>
                            </div>
                            <div class="col-md-12 p-4 form-right-header d-flex align-items-center">
                                <div class="grid-item p-2 pt-3">
                                    <small>
                                        <i class="fas fa-exclamation"></i>
                                        Na het klikken op <b>aanmaken</b> krijgt de grbuiker een email om zijn account eenvoudig aan te maken.
                                    </small>
                                </div>
                                <p class="m-0"></p>
                            </div>
                        </div>
                    </form>
                </div>
             </div>
            <!--Grid row-->
        </div>

    </main>

@endsection

<!-- Maybe later -->
{{--<div class="d-flex flex-row bg-white">--}}
    {{--<div class="col-lg-3 col-md-3 col-sm-12 p-0 form-content-wrap d-flex align-items-center">--}}
        {{--<div class="d-flex p-4">--}}
            {{--<span class="font-weight-bold">Permissie</span>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-9 col-md-9 col-sm-12 p-0 form-content-wrap d-flex align-items-center">--}}
        {{--<div class="d-flex pl-4 pr-4 pt-2 pb-2 flex-row w-100">--}}
            {{--<div class="d-flex flex-column justify-content-center w-100">--}}
                {{--<span class="font-weight-bold">Deelnemer</span>--}}
                {{--<label class="d-flex mt-1">--}}
                    {{--<input  class="label__checkbox" name="user" type="checkbox" {{ ($user->role_id == 3) ? 'checked' : '' }}/>--}}
                    {{--<span class="label__text">--}}
                                                    {{--<span class="label__check">--}}
                                                        {{--<i class="fa fa-check icon"></i>--}}
                                                    {{--</span>--}}
                                                {{--</span>--}}
                {{--</label>--}}
            {{--</div>--}}
            {{--<div class="d-flex flex-column justify-content-center w-100">--}}
                {{--<span class="font-weight-bold">Judge</span>--}}
                {{--<label class="d-flexs mt-1">--}}
                    {{--<input  class="label__checkbox" name="judge" type="checkbox" {{ ($user->role_id == 2) ? 'checked' : '' }} />--}}
                    {{--<span class="label__text">--}}
                                                {{--<span class="label__check">--}}
                                                    {{--<i class="fa fa-check icon"></i>--}}
                                                {{--</span>--}}
                                            {{--</span>--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}