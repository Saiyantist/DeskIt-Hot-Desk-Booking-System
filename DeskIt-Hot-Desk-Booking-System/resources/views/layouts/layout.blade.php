<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'laravel')}}</title>

    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/stylesWelcome.css">
    <link rel="stylesheet" href="/css/stylesUhome.css">
    <link rel="stylesheet" href="/css/stylesBooking.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/8d7ba59e72.js" crossorigin="anonymous"></script>
    
    
    @livewireStyles
</head>

<body>

    @if (request()->routeIs('welcome') || request()->routeIs('login'))
        @include('layouts.nav')
    @else
     <!-- Show nothing -->
    @endif

    
    {{-- page content --}}
    @yield('content')


    @if (request()->routeIs('welcome'))
        @include('partials.footer')
    @else
     <!-- Show nothing -->
    @endif
    @stack('scripts')
</body>
@livewireScripts
</html>