<section id="navigation">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard')}}"><img src="/images/logo.png" alt="logo"></a>
            <div class="justify-content-lg-end d-flex flex-row  px-2" id="collapsibleNavbar">

                <ul class="navbar-nav nav-menu mb-lg-0 px-3" id=btn>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('map')}}">Desk Map</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Users Management</a>
                    </li>
                </ul>
                <div class="compile">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:mr-6 justify-end">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-primary-button :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-black"
                                class=" bg-yellowB no-underline">
                                {{ __('Log Out') }}
                            </x-primary-button>
                        </form>



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