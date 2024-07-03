@include('partials.headNav')

<body>
  <section id="navigation">
    <div  x-data="darkModeToggle()">
    <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
      <div class="container-fluid">
        <a class="navbar-brand flex" href="{{route('welcome')}}">
            <img src="{{ asset('images/deskit_logo1.png') }}" class="object-contain -mr-[4.5rem] -ml-10" alt="logo">
            <img src="{{ asset('images/deskit_logoText.png') }}" class="object-contain -ml-20 inverter" alt="logo text">
        </a>
        <div class="justify-content-lg-end d-flex flex-row  px-2" id="collapsibleNavbar">

          <ul class="navbar-nav nav-menu mb-lg-0 px-3" id=btn>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('welcome')}}#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('welcome')}}#desk-booking">Desk Booking</a>
            </li>
            <li class="nav-item">
              <a class=" nav-link" href="{{route('welcome')}}#features">Features</a>
            </li>
          </ul>
          <div class="compile">
            @if (request()->routeIs('welcome') || request()->routeIs('faq') || request()->routeIs('privacyPolicy') || request()->routeIs('guides'))
            <a class="navbar-brand login" href="{{route('login')}}">LOGIN</a>
            @else
            <!-- Show nothing -->
            @endif
            <div class="hamburger">
              <span class="bar"></span>
              <span class="bar"></span>
              <span class="bar"></span>
            </div>
          </div>


        </div>
      </div>
    </nav>
  </div>
  </section>
  <script src="{{ asset('js/myScript.js') }}"></script>

</body>

</html>