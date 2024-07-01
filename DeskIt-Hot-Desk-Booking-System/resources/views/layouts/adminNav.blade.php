
{{-- to determine the current route name for active img--}}
@php
$currentRoute = Route::currentRouteName();
@endphp

<section id="navigation">
    <div x-data="darkModeToggle()">
        <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-custom flex">
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
    </div>
    
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
                <li class="sidebar-item absolute bottom-20 ">
                    <!-- Logout Link -->
                    <a href="#" class="sidebar-link" x-data x-on:click="$dispatch('open-modal', {name: 'logout-modal'})">
                        <img src="{{ asset('images/logout.svg') }}" class="hidden">
                        <span class="text-yellowB hidden">Logout</span>
                    </a>
                   
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>
                
                </li>

            </ul>
        </aside>
    </div>
    
    {{-- Logout Modal --}}
    <x-modal name="logout-modal" title="Logout">
        <x-slot:body>
            <div class='flex flex-column items-center justify-center rounded-3 w-[100%] h-fit p-2'>
                <div class='flex flex-column items-center justify-center text-center'>
                    <img src="{{ asset('images/!.svg') }}" class="w-10 h-10 mb-2">
                    <h2 class="text-lg font-semibold ">You are attempting to LOGOUT Deskit.</h2>
                    <p class=" text-lg ">Are you sure you want to log out?</p>
                </div>
        
                <div class="flex justify-center mt-3 space-x-4">
                    <button class="flex items-center border-solid border-gray-400 border-1 bg-gray-300 px-4 py-2 rounded-4 font-semibold text-lg text-white"
                            x-on:click="$dispatch('close-modal')">
                        Cancel
                    </button>
                    <button class="flex items-center border-solid border-red-400 border-1 bg-red-300 px-4 py-2 rounded-4 font-semibold text-lg text-white"
                            x-on:click="$dispatch('close-modal')"  @click.prevent="document.getElementById('logout-form').submit();">
                        Logout
                    </button>
                </div>
            </div>
        </x-slot:body>
    </x-modal>
</section>

<script src="{{ asset('js/myScript2.js') }}">
</script>