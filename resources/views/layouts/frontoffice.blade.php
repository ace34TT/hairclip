<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @stack('styles')
    @yield('extra-js')
</head>

<body class="antialiased overflow-x-hidden">
    <x-header />
    <main>
        @yield('content')
    </main>
    <x-footer />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @yield('script')
    @yield('component-script')
</body>

</html>
