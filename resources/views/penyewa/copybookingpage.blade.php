@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

@push('before-style')


    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-8">
                <h1>Booking</h1>
                <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
              
                <form class="booking-form" action="" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
                  <div class="row gy-4">

                    <div class="col-12">
                      <label class="label-form">Nama</label>
                      <input type="text" name="name" class="form-control" placeholder="Nama" required>
                    </div>
    
                    {{-- <div class="col-12 ">
                      <label class="label-form">Nama</label>
                      <input type="email" class="form-control" name="email" placeholder="Email" required="">
                    </div> --}}
    
                    <div class="col-12">
                      <label class="label-form">Nomor Telepon</label>
                      <input type="text" class="form-control" name="phone_number" placeholder="Nomor Telepon" required>
                    </div>

                    <div class="col-12">
                      <label class="label-form">Tanggal Keberangkatan</label>
                      <input type="date" class="form-control" name="departure-date" placeholder="Tanggal Keberangkatan" required>
                    </div>

                    <div class="col-12">
                      <label class="label-form">Tanggal Kepulangan</label>
                      <input type="date" class="form-control" name="arrival-date" placeholder="Tanggal Kepulangan" required>
                    </div>
    
                    <div class="col-12">
                      <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                    </div>
    
                    
    
                  </div>
                </form>

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

    {{-- <section class="booking-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                  <form action="" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
  
                      <div class="col-8">
                        <labell class="label-form">Nama</labell>
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                      </div>
      
                      <div class="col-8 ">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                      </div>
      
                      <div class="col-8">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                      </div>
      
                      <div class="col-12">
                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                      </div>
      
                      
      
                    </div>
                  </form>
    </section> --}}