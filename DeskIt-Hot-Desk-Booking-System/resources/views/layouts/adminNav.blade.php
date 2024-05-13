<section id="navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom flex">
        <div class="w-full flex justify-between">

            {{-- Brand Logo --}}
            <a class="navbar-brand" href="{{ route('dashboard')}}"><img src="{{ asset('images/deskit_logo.png') }}" class="object-contain" alt="logo"></a>

            <!-- Display Current User -->
            <div class="justify-content-lg-end d-flex flex-row px-2">
                <div class="hidden sm:flex sm:items-center sm:mr-6 justify-end">
                    <a wire:navigate href="{{route('profile')}}"
                        class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-full bg-yellowA hover:text-yellowBdarker dark:hover:text-yellowBdarker focus:outline-none transition ease-in-out duration-150 text-block no-underline"
                        style="border:1px solid #FBB503">
                        <div class="py-1"> <i class="fa-regular fa-user mr-1"></i> {{ Auth::user()->name }}</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="wrapper h-full z-50">
        <aside id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }} ">
                        <img src="{{ asset('images/home.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/ahome.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('map') ? 'active' : '' }}" href="{{ route('map') }}">
                        <img src="{{ asset('images/deskmap.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/adeskmap.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Desk Map</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('book-behalf') ? 'active' : '' }}"
                        href="{{ route('book-behalf') }}">
                        <img src="{{ asset('images/onbehalf.svg') }}" class="py-3 default-image"
                            alt="Default SVG Image">
                        <img src="{{ asset('images/aonbehalf.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB">Book on Behalf</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('support') ? 'active' : '' }}"
                        href="{{ route('support') }}">
                        <img src="{{ asset('images/help.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/ahelp.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span class="text-yellowB"> Help Desk</span>
                    </a>
                </li>
                <li class="sidebar-item absolute bottom-20">
                    <a href="{{ route('logout') }}" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('images/logout.svg') }}" class="py-3 default-image" alt="Logout Image">
                        <span class="text-yellowB">Logout</span>
                    </a>
                    
                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                        @csrf
                    </form>                    
                </li>
                
            </ul>
        </aside>
    </div>
</section>

<script src="{{ asset('js/myScript2.js') }}">
</script>