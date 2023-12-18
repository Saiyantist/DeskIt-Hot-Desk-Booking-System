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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen min-w-screen flex flex-row sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 mr-16">
            <div class=" sm:max-w-md flex justify-center items-end mt-40">
                <img src="/images/phone.png" alt="">
            </div>
            <div class="w-full sm:max-w-md mt-20 flex flex-col sm:justify-center items-center">
                <h1 style="font-size: 25pt; font-weight: bold;">WELCOME!</h1>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-yellowA dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
            </div>
            
           
        </div>
    </body>
</html>
