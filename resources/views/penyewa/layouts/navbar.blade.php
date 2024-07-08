<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/logo-hr.svg" alt=""> 
        {{-- <h1 class="sitename">Append</h1><span>.</span> --}}
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/bookingpage">Booking</a></li>
          <li><a href="/about">About</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}
      <a class="btn-getstarted dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Profile
      </a>
      
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="index.html#about">About Us</a>
        <a class="dropdown-item" href="index.html#services">Our Services</a>
        <a class="dropdown-item" href="index.html#contact">Contact Us</a>
      </div>

    </div>
</header>