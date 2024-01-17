@include('partials.headNav')

<body>
    <section id="navigation">
        <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('dashboard')}}"><img src="/images/logo.png" alt="logo"></a>
                <div class="justify-content-lg-end d-flex flex-row  px-2" id="collapsibleNavbar">

                    <ul class="navbar-nav nav-menu mb-lg-0 px-3" id=btn>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('dashboard')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('book')}}">Desk Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('notif')}}">Notification</a>
                        </li>
                    </ul>
                    <div class="compile">
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:mr-6 justify-end">
                            <x-dropdown align="right" width="40">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-white dark:text-gray-400 bg-yellowB dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1 ">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill="white" fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')" class="text-black">  {{-- profile.profile--}}
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-black">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <script src="{{ asset('js/myScript2.js') }}"></script>
    
</body>

</html>