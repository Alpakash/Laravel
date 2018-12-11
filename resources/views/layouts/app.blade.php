<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>

    @include('layouts.nav')

    @yield('content')

    @include('layouts.scripts')
</body>
</html>
