@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

    <section class="hero" id="home">
        <div class="container">

        <h2 class="h1 hero-title">Rasakan Kenyamanan Eksklusif</h2>

        <p class="hero-text">
            Kami membawa Anda lebih dekat dengan destinasi impian yang selama ini hanya bisa Anda bayangkan, dan nikmati perjalanan yang nyaman dan mewah dengan layanan kelas atas dari kami.
        </p>

        <div class="btn-group">
            

            <button class="btn btn-secondary">Book now</button>
        </div>

        </div>
    </section>

    <section class="section kantorcabang-detail">
        <div class="container">

        <div class="kantorcabang-detail-content">
  
            <p class="section-subtitle">Kantor Cabang</p>

            <h2 class="h2 section-title">{{$kantorcabang->name}}</h2>
            <ul class="kantorcabang-detail-list">
            
            <figure class="kantorcabang-detail-banner">
                <img src="{{ Storage::url($kantorcabang->image) }}" width="530" height="258" loading="lazy" alt="" class="w-100">
            </figure>

            <li class="kantorcabang-detail-item">

                <div class="kantorcabang-detail-item-icon">
                <ion-icon name="caret-forward-outline"></ion-icon>
                </div>

                <div class="kantorcabang-detail-item-content">
                <h3 class="h3 card-title">Nama</h3>
                <p class="card-text">
                    {{$kantorcabang->name}}
                </p>
                </div>

            </li>

            <li class="kantorcabang-detail-item">

                <div class="kantorcabang-detail-item-icon">
                <ion-icon name="caret-forward-outline"></ion-icon>
                </div>

                <div class="kantorcabang-detail-item-content">
                <h3 class="h3 card-title">Alamat</h3>
                <p class="card-text">
                    {{$kantorcabang->address}}
                </p>
                </div>

            </li>

            <li class="kantorcabang-detail-item">

                <div class="kantorcabang-detail-item-icon">
                <ion-icon name="caret-forward-outline"></ion-icon>
                </div>

                <div class="kantorcabang-detail-item-content">
                <h3 class="h3 card-title">Lokasi (Longitude, Latitude)</h3>
                <p class="card-text">
                    {{$kantorcabang->location}}
                </p>
                </div>

            </li>

            </ul>
        
        </div>

        </div>
    </section>

    {{-- <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">List Bus</p>

          <h2 class="h2 section-title">Di Kantor Cabang {{ $kantorcabang->name }}</h2>

          @if ($kantorcabang->bus->isNotEmpty())
          @foreach ($kantorcabang->bus as $bus)

          <ul class="blog-list">

            <li>
              <div class="blog-card">

                <figure class="blog-card-banner">

                  <a href="#">
                    <img src="{{ Storage::url($bus->image) }}" width="370" height="259" loading="lazy"
                      alt="..." class="img-cover">
                  </a>

                </figure>

                <div class="blog-card-content">


                  <h3 class="h3 card-title">
                    
                      {{ $bus->name }}
                  
                  </h3>

                  <a href="#" class="btn-link">
                    <span>Read More</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

          </ul>
          @endforeach
          @else
            <p class="text-center">Kantor Cabang ini belum memiliki Bus</p>
            @endif
        </div>
    </section> --}}

    <section class="popular" id="destination">
        <div class="container">
        

                <p class="section-subtitle">Temukan Wisata</p>

                <h2 class="h2 section-title">Destinasi Populer</h2>

                @if ($kantorcabang->bus->isNotEmpty())
                @foreach ($kantorcabang->bus as $bus)

               

                <ul class="blog-popular-list">

                    <li>
                        <div class="popular-card">
        
                        <figure class="card-img">
                            <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGJhbGl8ZW58MHx8MHx8fDA%3D" alt="San miguel, italy" loading="lazy">
                        </figure>
        
                        <div class="card-content">
        
                            <h3 class="h3 card-title">
                            <a href="#">{{ $bus->name }}</a>
                            </h3>
        
                            <p class="card-text">
                            {{ $bus->description }}
                            </p>
        
                        </div>
        
                        </div>
                    </li>

                </ul>
                @endforeach
                @else
                    <p class="text-center">Kantor Cabang ini belum memiliki Bus</p>
                    @endif

        </div>
    </section>