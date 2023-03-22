<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/logo/1_transparent_logo_black_scroped.png') }}">
    <title>Hairclip - @yield('title')</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
        integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')
    @yield('component-script')
</body>

</html>
