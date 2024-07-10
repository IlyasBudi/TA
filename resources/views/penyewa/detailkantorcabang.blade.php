@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

    <!-- Page Title -->
    <div class="page-title-details" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <p class="mb-0">Kantor Cabang</p>
                <h1>{{ $kantorcabang->name }}</h1>
              </div>
            </div>
          </div>
        </div>
        {{-- <nav class="breadcrumbs">
          <div class="container">
            <ol>
              <li><a href="index.html">Home</a></li>
              <li class="current">Services Details</li>
            </ol>
          </div>
        </nav> --}}
    </div><!-- End Page Title -->
  
      <!-- Service Details Section -->
    <section id="kantorcabang-details" class="kantorcabang-details section">
  
        <div class="container">
  
          <div class="row gy-5">
  
            <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">

              <img src="{{ Storage::url($kantorcabang->image) }}" height="480" height="720" class="img-fluid services-img">
              <h4>- Nama</h4>
              <p>
                {{ $kantorcabang->name }}
              </p>
              <h4>- Alamat</h4>
              <p>
                {{ $kantorcabang->address }}
              </p>
              <h4>- Location (Longitude, Latitude)</h4>
              <p>
                {{ $kantorcabang->location }}
              </p>
            </div>
  
          </div>
  
        </div>
  
    </section><!-- /Service Details Section -->

    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>bus</h2>
          <p>Temukan destinasi populer di seluruh dunia dengan layanan kami dan nikmati pengalaman liburan yang tak terlupakan.</p>
        </div><!-- End Section Title -->
  
        <div class="container">

          <div class="row gy-4">
  
            @if ($kantorcabang->bus->isNotEmpty())
            @foreach ($kantorcabang->bus as $bus)

            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <article>
  
                <div class="post-img">
                  <img src="{{ Storage::url($bus->image) }}" height="240" width="720" alt="" class="img-fluid">
                </div>
  
                <h2 class="title">
                  <a href="blog-details.html">{{ $bus->name }}</a>
                </h2>

                <p class="post-category">{{ $bus->description }}</p>
  
              </article>
            </div><!-- End post list item -->
            @endforeach
            @else
            <p class="text-center">Kantor Cabang ini belum memiliki Bus</p>
             @endif
          </div><!-- End recent posts list -->
          
          

        </div>
  
    </section><!-- /Recent Posts Section -->