<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    @extends('layouts.nav')

    <body class="font-sans antialiased">

        <div class="min-h-screen min-w-screen flex flex-row sm:justify-center items-center pt-6 sm:pt-0">

            {{-- Image - LEFT --}}
            <div class="sm:max-w-md flex justify-center items-end">
                <img src="/images/phone.png" alt="">
            </div>

            {{-- Heading and Form - RIGHT --}}
            <div class="w-full sm:max-w-md sm:rounded-lg  shadow-md overflow-hidden ">
                
                {{ $slot }} 
            </div>
               
        </div>
    </body>
</html>
