<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>
    @if(Session::has('msg-success'))
        <main class="pt-5 mx-lg-5 ">
            <div class="container-fluid mt-5">
                    <span>{!! session('msg-success') !!}</span>
                </div>
            </div>
        </main>
    @endif
    <div class="" style="height: 100vh;background-image: url('http://www.pirineuemocio.com/wp-content/uploads/2015/08/excursion-a-carcassone.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;")>
        <div class="mask d-flex justify-content-center align-items-center">
            @yield('content')
        </div>
    </div>

    @include('layouts.scripts')
</body>
</html>
