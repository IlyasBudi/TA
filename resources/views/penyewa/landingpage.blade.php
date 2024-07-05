@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

<main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Rasakan Kenyamanan Eksklusif</h2>

          <p class="hero-text">
            Kami membawa Anda lebih dekat dengan destinasi impian yang selama ini hanya bisa Anda bayangkan, dan nikmati perjalanan yang nyaman dan mewah dengan layanan kelas atas dari kami.
          </p>

          <div class="btn-group">
            {{-- <button class="btn btn-primary">Learn more</button> --}}

            <button class="btn btn-secondary">Book now</button>
          </div>

        </div>
      </section>



      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Temukan Wisata</p>

          <h2 class="h2 section-title">Destinasi Populer</h2>

          <p class="section-text">
            Temukan destinasi populer di seluruh dunia dengan layanan kami dan nikmati pengalaman liburan yang tak terlupakan.
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGJhbGl8ZW58MHx8MHx8fDA%3D" alt="San miguel, italy" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">Bali</a>
                  </h3>

                  <p class="card-text">
                    pura ulun danu bedugul.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="https://images.unsplash.com/photo-1698592897445-2b87b26c2db3?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGJyb21vJTIwbW91bnRhaW58ZW58MHx8MHx8fDA%3D" alt="Burj khalifa, dubai" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">Malang</a>
                  </h3>

                  <p class="card-text">
                    gunung bromo.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="https://images.unsplash.com/photo-1628488321763-eb2f79b7f3b5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fHByYW1iYW5hbiUyMHRlbXBsZXxlbnwwfHwwfHx8MA%3D%3D" alt="Kyoto temple, japan" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="#">Jogja</a>
                  </h3>

                  <p class="card-text">
                    candi prambanan.
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PACKAGE
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Category Bus</p>

          <h2 class="h2 section-title">Pilihan Bus Kami</h2>

          <p class="section-text">
            Jelajahi berbagai pilihan bus kami yang nyaman dan andal untuk memenuhi kebutuhan perjalanan Anda.
          </p>

          <ul class="package-list">

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/hw08-yudhistira.png" alt="Experience The Great Holiday On Beach" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">BIG BUS Seat 46 2-2 Toilet</h3>

                  <p class="card-text">
                    Capacity 46 Seat, Konf 2 - 2, Toilet, Full AC, Smoking Room, Reclining Seat, Arm rest, Leg rest (Optional), Water Dispenser, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light.
                  </p>

                  {{-- <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li>

                  </ul> --}}

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    {{-- <p class="reviews">(25 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $750
                    <span>/ per person</span>
                  </p> --}}

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/hw19-satrio-piningit.png" alt="Summer Holiday To The Oxolotan River" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">BIG BUS Seat 59 2-3 Non Toilet</h3>

                  <p class="card-text">Capacity 59 Seat, Konf 2 - 3, Non Toilet, Full AC, Reclining Seat, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light
                  </p>

                  {{-- <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li>

                  </ul> --}}

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    {{-- <p class="reviews">(20 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $520
                    <span>/ per person</span>
                  </p> --}}

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/hw17-rengganis.png" alt="Santorini Island's Weekend Vacation" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">BIG BUS Seat 50 2-2 Non Toilet</h3>

                  <p class="card-text">
                    Capacity 50 Seat, Konf 2 - 2, NON Toilet, Full AC, Reclining Seat, Arm rest, Leg rest (Optional), Water Dispenser, TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, P3K, APAR Ready, Glass Breaker, Ambient Light.
                  </p>

                  <ul class="card-meta-list">

                    {{-- <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Malaysia</p>
                      </div>
                    </li> --}}

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    {{-- <p class="reviews">(40 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $660
                    <span>/ per person</span>
                  </p> --}}

                  <button class="btn btn-secondary">Book Now</button>

                </div>

              </div>
            </li>

            <li>
                <div class="package-card">
  
                  <figure class="card-banner">
                    <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/md06.png" alt="Summer Holiday To The Oxolotan River" loading="lazy">
                  </figure>
  
                  <div class="card-content">
  
                    <h3 class="h3 card-title">Medium Bus Seat 35/39 2-2</h3>
  
                    <p class="card-text">Capacity 35/39 Seat, Konf 2 - 2, Non Toilet, Full AC, Reclining Seat, Arm rest, Leg rest (Optional), TV, Radio, Karaoke, Charging port (Not Suitable for Powerbank), Bantal/Selimut, Extra Luggage, Emergency Door, APAR Ready, Glass Breaker, Ambient Light
                    </p>
  
                    {{-- <ul class="card-meta-list">
  
                      <li class="card-meta-item">
                        <div class="meta-box">
                          <ion-icon name="time"></ion-icon>
  
                          <p class="text">7D/6N</p>
                        </div>
                      </li>
  
                      <li class="card-meta-item">
                        <div class="meta-box">
                          <ion-icon name="people"></ion-icon>
  
                          <p class="text">pax: 10</p>
                        </div>
                      </li>
  
                      <li class="card-meta-item">
                        <div class="meta-box">
                          <ion-icon name="location"></ion-icon>
  
                          <p class="text">Malaysia</p>
                        </div>
                      </li>
  
                    </ul> --}}
  
                  </div>
  
                  <div class="card-price">
  
                    <div class="wrapper">
  
                      {{-- <p class="reviews">(20 reviews)</p>
  
                      <div class="card-rating">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                      </div>
  
                    </div>
  
                    <p class="price">
                      $520
                      <span>/ per person</span>
                    </p> --}}
  
                    <button class="btn btn-secondary">Book Now</button>
  
                  </div>
  
                </div>
              </li>

          </ul>

          <button class="btn btn-primary">View All Packages</button>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about">
        <div class="container">

          <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">Explore all tour of the world with us.</h2>

            <p class="section-text">
              Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or
              randomised words
              which don't look even slightly believable.
            </p>

            <ul class="about-list">

              <li class="about-item">

                <div class="about-item-icon">
                  <ion-icon name="compass"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 card-title">Tour guide</h3>

                  <p class="card-text">
                    Lorem Ipsum available, but the majority have suffered alteration in some.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="about-item-icon">
                  <ion-icon name="briefcase"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 card-title">Friendly price</h3>

                  <p class="card-text">
                    Lorem Ipsum available, but the majority have suffered alteration in some.
                  </p>
                </div>

              </li>

              <li class="about-item">

                <div class="about-item-icon">
                  <ion-icon name="umbrella"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 card-title">Reliable tour</h3>

                  <p class="card-text">
                    Lorem Ipsum available, but the majority have suffered alteration in some.
                  </p>
                </div>

              </li>

            </ul>

            <button href="#" class="btn btn-primary">Booking Now</button>

          </div>

          {{-- <figure class="about-banner">
            <img src="{{ asset('/landingpagetemplate') }}/assets/images/gallery-2.jpg" width="378" height="421" loading="lazy" alt="" class="w-100">
          </figure> --}}
        
          

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
              Fusce hic augue velit wisi quibusdam pariatur, iusto primis, nec nemo, rutrum. Vestibulum cumque
              laudantium. Sit ornare
              mollitia tenetur, aptent.
            </p>
          </div>

          <button class="btn btn-secondary">Contact Us !</button>

        </div>
      </section>

    </article>
</main>

@endsection