<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Po Haryanto Pariwisata | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/penyewatemplate') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('/penyewatemplate') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('/penyewatemplate') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('/penyewatemplate') }}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Navbar ======= -->
    @include('penyewa.layouts.navbar')

    <!-- ======= Main Content ======= -->
    <main class="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    @include('penyewa.layouts.footer')

    <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  {{-- <div id="preloader"></div> --}}

  <!-- Vendor JS Files -->
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('/penyewatemplate') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('/penyewatemplate') }}/assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var dropdownToggle = document.querySelector('.btn-getstarted.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            var isDisplayed = window.getComputedStyle(dropdownMenu).display !== 'none';
            dropdownMenu.style.display = isDisplayed ? 'none' : 'block';
        });
    });
  </script>
</body>