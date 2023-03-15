<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
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
    @yield('script')
</body>

</html>
