<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.header')
    <body>
        @yield('container')
        @include('includes.notif')
        @include('includes.footer')
    </body>
</html>
