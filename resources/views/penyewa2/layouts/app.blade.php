<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Po. Haryanto Pariwisata| @yield('title')</title>

  <!-- 
    - favicon
  -->
  {{-- <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml"> --}}

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="{{ asset('/landingpagetemplate') }}/assets/css/style.css">
  

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">

    @yield('styles')
</head>

<body>
    <div class="page-holder">
        <!-- navbar -->
        @include('penyewa.layouts.navbar')

        <!-- Main Content -->
        <main id="main" class="main">
            @yield('content')
        </main>
        <!-- End Main Content -->

        <!-- footer -->
        @include('penyewa.layouts.footer')

        <a href="#top" class="go-top" data-go-top>
            <ion-icon name="chevron-up-outline"></ion-icon>
        </a>

        <!-- Script -->
        <script src="{{ secure_asset('/landingpagetemplate') }}/assets/js/script.js"></script>
        

        <!-- ionicon link -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script>
                    /**
         * navbar toggle
         */

        const overlay = document.querySelector("[data-overlay]");
        const navOpenBtn = document.querySelector("[data-nav-open-btn]");
        const navbar = document.querySelector("[data-navbar]");
        const navCloseBtn = document.querySelector("[data-nav-close-btn]");
        const navLinks = document.querySelectorAll("[data-nav-link]");

        const navElemArr = [navOpenBtn, navCloseBtn, overlay];

        const navToggleEvent = function (elem) {
        for (let i = 0; i < elem.length; i++) {
            elem[i].addEventListener("click", function () {
            navbar.classList.toggle("active");
            overlay.classList.toggle("active");
            });
        }
        }

        navToggleEvent(navElemArr);
        navToggleEvent(navLinks);



        /**
         * header sticky & go to top
         */

        const header = document.querySelector("[data-header]");
        const goTopBtn = document.querySelector("[data-go-top]");

        window.addEventListener("scroll", function () {

        if (window.scrollY >= 200) {
            header.classList.add("active");
            goTopBtn.classList.add("active");
        } else {
            header.classList.remove("active");
            goTopBtn.classList.remove("active");
        }

        });
        </script>

        <script>
          document.getElementById('profile-btn').addEventListener('click', function() {
            var dropdown = document.getElementById('profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
          });

          // Optional: Tutup dropdown jika klik di luar
          window.onclick = function(event) {
            if (!event.target.matches('.btn')) {
              var dropdowns = document.getElementsByClassName("dropdown-menu");
              for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                  openDropdown.style.display = 'none';
                }
              }
            }
          }

          // document.addEventListener('DOMContentLoaded', function() {
          //   // Temukan tombol dan dropdown menu
          //   var profileBtn = document.getElementById('profile-btn');
          //   var profileDropdown = document.getElementById('profile-dropdown');

          //   // Tambahkan event listener ke tombol
          //   profileBtn.addEventListener('click', function() {
          //     // Cek apakah dropdown saat ini ditampilkan atau tidak
          //     var isDisplayed = window.getComputedStyle(profileDropdown).display === 'block';
          //     // Toggle display property
          //     profileDropdown.style.display = isDisplayed ? 'none' : 'block';
          //   });
          // });
        </script>

    </div>


</body>