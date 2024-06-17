
{{-- to determine the current route name for active img--}}
@php
$currentRoute = Route::currentRouteName();
@endphp

<section id="navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom flex">
        <div class="w-full flex justify-between">
        
            {{-- Brand Logo --}}
            <div class="navbar-brand" > 
                <img src="{{ asset('images/deskit_logo.png') }}"
                class="object-contain" alt="logo">
            </div>

            {{-- Profile --}}
            <div class="justify-content-lg-end d-flex flex-row px-2">
                <div class="compile mr-10 text-xl">
                    @livewire('notification')
                </div>
                
                <div class="compile mr-10">
                    <a wire:navigate href="{{route('profile')}}"
                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-full bg-yellowA hover:text-yellowBdarker dark:hover:text-yellowBdarker focus:outline-none transition ease-in-out duration-150 text-block no-underline"
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
                    <a wire:navigate href="{{ route('home') }}" 
                        class="hidden sidebar-link {{ $currentRoute === 'home' ? 'active' : '' }}">
                        <img src="{{ asset('images/home.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/ahome.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Dashboard</span>
                    </a>
                </li>

                {{-- desk map --}}
                <li class="sidebar-item">
                    <a wire:navigate href="{{ route('map') }}" 
                        class="hidden sidebar-link {{ $currentRoute === 'map' ? 'active' : '' }}">
                        <img src="{{ asset('images/deskmap.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/adeskmap.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Desk Map</span>
                    </a>
                </li>

                {{-- book on behalf --}}
                <li class="sidebar-item">
                    <a wire:navigate href="{{ route('book-behalf') }}" 
                        class="hidden sidebar-link {{ $currentRoute === 'book-behalf' ? 'active' : '' }}">
                        <img src="{{ asset('images/onbehalf.svg') }}" class="py-3 default-image"
                            alt="Default SVG Image">
                        <img src="{{ asset('images/aonbehalf.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Book on Behalf</span>
                    </a>
                </li>

                {{-- Support --}}
                <li class="sidebar-item">
                    <a wire:navigate href="{{ route('support') }}" 
                        class="hidden sidebar-link {{ $currentRoute === 'support' ? 'active' : '' }}">
                        <img src="{{ asset('images/help.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/ahelp.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB"> Help Desk</span>
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
                                x-show="showLogoutModal" x-cloak>

                                <div class="flex flex-col justify-center items-center bg-white p-8 rounded-xl shadow-lg"
                                style="border-top: 10px solid rgb(255, 237, 193); border-bottom: 10px solid rgb(255, 237, 193);">
                                    <img src="{{ asset('images/!.svg') }}" class="w-10 h-10 mb-2">
                                    <h2 class="text-lg font-semibold ">You are attempting to LOGOUT Deskit.</h2>
                                    <p  class=" text-lg ">Are you sure you want to log out?</p>

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
                            <form id="logout-form" method="POST" action="{{ route('logout') }}"
                                 style="display: none;">
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