<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name', 'laravel')}}</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
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
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js" defer></script>
    <style>
        .darkmode-layer, .darkmode-toggle {
            z-index: 20;
        }
        .darkmode--activated .navbar{
            -webkit-filter: invert(1);
            filter: invert(1);
        }
        .darkmode--activated .sidebar-item {
            -webkit-filter: invert(1);
            filter: invert(1);
        }
        .darkmode--activated .toggle-btn {
            -webkit-filter: invert(1);
            filter: invert(1);
        }
        .darkmode--activated .element-selector {
            background-color: #c7c6c6 !important;
            color: #000000 !important; 
        }
        .darkmode--activated  {
            background-color:  #fcfeff !important; 
            color:  #15202B !important;
            position: relative;
        }
        .darkmode--activated .inverter {
            -webkit-filter: invert(1);
            filter: invert(1);
        }
        .darkmode--activated .backdrop {
            background: rgba(255, 255, 255, 0.3); 

        }
        .darkmode--activated .bground {
            filter: grayscale(50%) brightness(80%);
        }
        
        .darkmode--activated .text-white {
            color: #000000 !important; 
        }
        .darkmode--activated .text-green-50{
            color: #000000 !important; 
        }
    </style>
    <script>
    function darkModeToggle() {
        return {
            darkmode: null,
            isDarkMode: false,
            init() {
                // Initialize darkmode instance
                this.darkmode = new Darkmode({ 
                    time: '0.5s',
                    mixColor: '#ffffff', 
                    backgroundColor: '#15202B',
                    buttonColorDark: '#333333',
                    buttonColorLight: '#ffffff', 
                    label: '🌓',
                    saveInCookies: true,
                    autoMatchOsTheme: false,
                    
                });
                this.darkmode.showWidget();

                // Apply dark mode on load if saved
                if (this.darkmode.isActivated()) {
                    this.isDarkMode = true;
                }
            },
            toggleDarkMode() {
                this.darkmode.toggle();
                this.isDarkMode = this.darkmode.isActivated();
                
            },
        };
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('darkModeToggle', darkModeToggle());
    });
</script>        
    
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