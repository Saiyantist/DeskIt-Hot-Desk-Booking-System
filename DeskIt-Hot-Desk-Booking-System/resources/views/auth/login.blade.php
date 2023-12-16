<!-- Sariling Navbar -->
<!-- kase dapat hindi na makita 'yung "LOGIN" button if nasa login na. -->

<head>
    <!-- navbar -->
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/stylesNavbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- BootsTrap jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<x-guest-layout>
    <!-- Session Status -->
    
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Sariling Navbar -->
    <!-- kase dapat hindi na makita 'yung "LOGIN" button if nasa login na. -->
    
    <section id="navigation">
        <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{route('welcome')}}"><img src="/images/logo.png" alt="logo" ></a>
                <div class="justify-content-lg-end d-flex flex-row  px-2" id="collapsibleNavbar">
                
                    <ul class="navbar-nav nav-menu mb-lg-0 px-3" id=btn>
                        <li class="nav-item">
                        <a class="nav-link activ" href="{{route('welcome')}}#home">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('welcome')}}#desk-booking">Desk Booking</a>
                        </li>
                        <li class="nav-item">
                        <a class=" nav-link" href="{{route('welcome')}}#features">Features</a>
                        </li>
                    </ul> 

                    <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <!-- Burger script -->
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".nav-menu");
  
        hamburger.addEventListener("click", mobileMenu);
  
        function mobileMenu() {
          hamburger.classList.toggle("active");
          navMenu.classList.toggle("active");
        }
  
        const navLink = document.querySelectorAll(".nav-link");
  
        navLink.forEach((n) => n.addEventListener("click", closeMenu));
  
        function closeMenu() {
          hamburger.classList.remove("active");
          navMenu.classList.remove("active");
        }
        /* Code for changing active  
        link on clicking */ 
        var a =  
            $("#navigation .navbar-nav .navbar-item .nav-link"); 
    
        for (var i = 0; i < a.length; i++) { 
            a[i].addEventListener("click", 
                                  function () { 
                var current = document
                    .getElementsByClassName("active"); 
    
                current[0].className = current[0] 
                    .className.replace(" active", ""); 
    
                this.className += " active"; 
            }); 
        } 
    
        /* Code for changing active  
        link on Scrolling */ 
        $(window).scroll(function () { 
            var distance = $(window).scrollTop(); 
            $('.page-section').each(function (i) { 
    
                if ($(this).position().top  
                    <= distance + 250) { 
                      
                        $('.navbar-nav a.active') 
                            .removeClass('active'); 
    
                        $('.navbar-nav a').eq(i) 
                            .addClass('active'); 
                } 
            }); 
        }).scroll(); 
  
    </script>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- DI NA PALA KAILANGAN NITO

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> 

        --}}

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div class="flex justify-center items-center">
            <button class="mt-4 bg-yellowB rounded-xl py-2 w-full">
                {{ __('LOGIN') }}
            </button>       
        </div>
        <div class="flex items-center justify-end mt-1">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500 dark:focus:ring-offset-gray-800 text-black" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
        
    </form>
</x-guest-layout>
