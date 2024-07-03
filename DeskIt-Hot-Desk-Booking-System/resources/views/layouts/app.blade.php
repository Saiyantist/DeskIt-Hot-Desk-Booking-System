<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Load Alpine.js and Darkmode.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js" defer></script>
      
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/stylesAdminSidebar.css">
        <link rel="stylesheet" href="/css/stylesAdminSidebar.css">
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles 
        <link rel="stylesheet" href="{{ asset('vendor/power-components/livewire-powergrid/powergrid.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-100 dark:bg-gray-900">

            {{-- Show corresponding TOP NAVIGATION --}}
            @if(auth()->check())
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('officemanager'))
                    @include('layouts.adminNav')
                @elseif(Auth::user()->hasRole('employee'))
                    @include('layouts.userNav')
                @endif
            
            @endif

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="{{ asset('vendor/power-components/livewire-powergrid/powergrid.js') }}"></script>
        @livewireScripts
    </body>
</html>
