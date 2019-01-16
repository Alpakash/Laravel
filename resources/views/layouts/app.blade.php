<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>

    @include('layouts.nav')
    <div class="pagesImg">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <center>{{ session()->get('message') }}</center>
            </div>
        @endif
    @yield('content')

    @include('layouts.scripts')
    </div>
</body>
</html>
