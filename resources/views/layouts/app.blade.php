<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>

    @include('layouts.nav')
    <div class="pagesImg">
    @yield('content')

    @include('layouts.scripts')
    </div>
</body>
</html>
