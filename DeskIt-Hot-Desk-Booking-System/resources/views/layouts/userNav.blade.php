{{-- <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> --}}
        {{-- commented to avoid two burger for smaller screen--}}
        <!-- Hamburger -->
        {{-- <div class="-mr-2 flex items-center sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div> --}}

    {{-- </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>   --}}

@include('partials.headNav')
@php
$currentRoute = Route::currentRouteName();
@endphp

<body>
    <section id="navigation">
        <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
            <div class="w-full flex justify-between">
                
                {{-- logo --}}
                <div class="navbar-brand">
                    <img src="{{ asset('images/deskit_logo.png') }}" class="object-contain" alt="logo">
                </div>
                
                {{-- profile --}}
                <div class="justify-content-lg-end d-flex flex-row px-2">
                    <div class="compile mr-10">

                        <a wire:navigate href="{{route('userProfile')}}"
                            class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-full dark:text-gray-400 bg-yellowA dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 text-block no-underline"
                            style="border: 1px solid #FBB503">
                            <div class="py-1"> <i class="fa-regular fa-user mr-1"></i> {{ Auth::user()->name }}</div>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- sidebar --}}
        <div class="wrapper h-full z-50">
            <aside id="sidebar">
                <div class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul class="sidebar-nav">

                    {{-- dashboard --}}
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard') }}"
                            class="hidden sidebar-link {{ $currentRoute === 'dashboard' ? 'active' : '' }}">
                            <img src="{{ asset('images/home.svg') }}" class="py-3 default-image"
                                alt="Default SVG Image">
                            <img src="{{ asset('images/ahome.svg') }}" class="py-3 alternative-image"
                                alt="Alternative SVG Image">
                            <span class="text-yellowB">Dashboard</span>
                        </a>
                    </li>

                    {{-- desk map --}}
                    <li class="sidebar-item">
                        <a wire:navigate href="{{ route('book') }}"
                            class="hidden sidebar-link {{ $currentRoute === 'book' ? 'active' : '' }}">
                            <img src="{{ asset('images/deskmap.svg') }}" class="py-3 default-image"
                                alt="Default SVG Image">
                            <img src="{{ asset('images/adeskmap.svg') }}" class="py-3 alternative-image"
                                alt="Alternative SVG Image">
                            <span class="text-yellowB">Desk Booking</span>
                        </a>
                    </li>

                    

                    {{-- logout --}}
                    <li class="sidebar-item absolute bottom-20">
                        <div x-cloak x-data="{ showLogoutModal: false }">

                            <!-- Logout Link -->
                            <a href="#" class="sidebar-link" @click.prevent="showLogoutModal = true">
                                <img src="{{ asset('images/logout.svg') }}" class="hidden">
                                <span class="text-yellowB hidden">Logout</span>
                            </a>
                        
                            <!-- Modal -->
                            <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-500 bg-opacity-75"
                                x-show="showLogoutModal">
                        
                                <div class="flex flex-col justify-center items-center bg-white p-8 rounded-xl shadow-lg"
                                    style="border-top: 10px solid rgb(255, 237, 193); border-bottom: 10px solid rgb(255, 237, 193);">
                                    <img src="{{ asset('images/!.svg') }}" class="w-10 h-10 mb-2">
                                    <h2 class="text-lg font-semibold ">You are attempting to LOGOUT Deskit.</h2>
                                    <p class=" text-lg ">Are you sure you want to log out?</p>
                        
                                    <div class="mt-2 space-x-2">
                                        <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg"
                                            @click="showLogoutModal = false"> Cancel </button>
                                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg"
                                            @click.prevent="document.getElementById('logout-form').submit();">
                                            Logout </button>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Hidden Logout Form -->
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        
                    </li>



                </ul>
            </aside>
        </div>
    </section>

    <script src="{{ asset('js/myScript2.js') }}">
    </script>
</body>

</html>
