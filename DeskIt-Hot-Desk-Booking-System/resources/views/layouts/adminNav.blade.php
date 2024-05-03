<section id="navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom flex">
        <div class="w-full flex justify-between">
            <a class="navbar-brand" href="{{ route('dashboard')}}"><img src="{{ asset('images/deskit_logo.png') }}" class="object-contain" alt="logo"></a>
            <div class="justify-content-lg-end d-flex flex-row px-2">
                {{--
                <ul class="navbar-nav nav-menu mb-lg-0 px-3" id=btn>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('book-behalf')}}">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('map')}}">Desk Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Users Management</a>
                    </li>
                </ul> --}}
                <div class="compile">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:mr-6 justify-end">
                        <a wire:navigate href="{{route('profile')}}"
                            class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-full  dark:text-gray-400 bg-yellowA dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 text-block no-underline"
                            style="border:1px solid #FBB503">
                            <div class="py-1"> <i class="fa-regular fa-user mr-1"></i> {{ Auth::user()->name }}</div>
                        </a>





                    </div>


                </div>
            </div>
        </div>
    </nav>
    <div class="wrapper min-h-screen">
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
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('map') ? 'active' : '' }}" href="{{ route('map') }}">
                        <img src="{{ asset('images/deskmap.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/adeskmap.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span>Desk Map</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('book-behalf') ? 'active' : '' }}"
                        href="{{ route('book-behalf') }}">
                        <img src="{{ asset('images/onbehalf.svg') }}" class="py-3 default-image"
                            alt="Default SVG Image">
                        <img src="{{ asset('images/aonbehalf.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span>Book on Behalf</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a wire:navigate class="sidebar-link {{ request()->is('support') ? 'active' : '' }}"
                        href="{{ route('support') }}">
                        <img src="{{ asset('images/help.svg') }}" class="py-3 default-image" alt="Default SVG Image">
                        <img src="{{ asset('images/ahelp.svg') }}" class="py-3 alternative-image"
                            alt="Alternative SVG Image">
                        <span> Help Desk</span>
                    </a>
                </li>
            </ul>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-primary-button :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class=" sidebar-link border-0 mb-4">
                    <img src="{{asset('images/logout.svg')}}" alt="SVG Image">
                    <span class=" text-yellowB">Logout</span>
                </x-primary-button>
            </form>
        </aside>
    </div>
</section>

<script src="{{ asset('js/myScript2.js') }}">
</script>