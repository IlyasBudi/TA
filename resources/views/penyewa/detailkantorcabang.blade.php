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

              <img src="{{ Storage::url($kantorcabang->image) }}" alt="" class="img-fluid services-img">
              <h4>Sejarah PO Haryanto</h4>
              <p>
                PO Haryanto didirikan pada tahun 2002 oleh H. Haryanto asal Kudus, Jawa Tengah setelah purna bertugas di Batalyon Artileri Pertahanan Udara Ringan 1/Kostrad TNI Angkatan Darat di Tangerang. Sebelumnya, ia adalah seorang tentara yang memiliki berbagai pekerjaan sampingan, salah satunya adalah agen tiket bus.

                    Dengan mendapatkan pinjaman dari bank, ia membeli enam buah bus dan menggunakan armadanya tersebut untuk trayek perkotaan dengan rute Cikarang-Cimone.
              </p>
              <p>
                Tetapi setelah beberapa waktu, rute tersebut dianggap kurang menguntungkan dikarenakan sepinya penumpang. Akhirnya ia mengubah armada tersebut menjadi kelas eksekutif dan mengalihkan trayeknya ke trayek antarkota dengan rute Jakarta-Kudus, Jakarta-Pati dan Jakarta-Jepara.
                Mulai saat itulah perusahaan busnya mulai berkembang. Pada tahun 2009, PO Haryanto melakukan ekspansi bisnis pertamanya di luar Muria Raya dan juga di luar Pulau Jawa, yakni di Pulau Madura dengan trayek Jakarta-Pamekasan-Sumenep.
              </p>
              <p>
                Tiga tahun kemudian tepatnya di tahun 2012, PO Haryanto kembali melakukan ekspansi bisnisnya, kali ini berada di jalur selatan jawa dengan trayek pertama yakni Jakarta-Solo-Ponorogo, serta kota-kota lain di sekitar Solo Raya seperti Klaten dan Gemolong.

                Di tahun yang sama pula, PO Haryanto juga merintis trayek menuju Bojonegoro dan Purwodadi dengan bantuan adiknya, H. Annas. Saat ini, PO Haryanto telah melayani lebih dari 20 kota di Pulau Jawa dengan beberapa divisi.
              </p>
              <h4>Ciri Khas PO Haryanto</h4>
              <p>
                Haryanto dikenal dengan penggunaan skema warna bodi bus yang beragam dan meriah, serta mengangkat potensi pariwisata Kudus. Masjid Menara Kudus menjadi ikon dari bus-bus Haryanto, ditempel pada bodi samping bus. Rian Mahendra selaku Direktur Operasional (pada waktu itu) mengatakan bahwa dalam menjalankan bisnisnya, Haryanto memanfaatkan filosofi "ilmu langit", maksudnya "nilai-nilai keagamaan Islam dijadikan acuan dalam berbisnis (bus)". Untuk mewujudkan misi korporatnya itu, kaligrafi sholawat "ṣalā-llāhu ʿala Muḥammad" ditempel di seluruh armada bus Haryanto.

                Sebagian armada (khususnya armada keluaran 2018 keatas) juga dilengkapi dengan gambar wayang kulit, biasanya bergambar Werkudara atau Rama dan Sinta.
              </p>
              <p>
                Selain ciri khas dalam armada, Haryanto juga memiliki ciri khas dalam pelayanan. Seperti peraturan untuk berhenti melaksanakan ibadah sholat (hanya khusus untuk yang Muslim) ketika dalam perjalanan, atau uang tiket konsumen yang dimana akan disumbangkan kepada yang membutuhkan sebesar 2,5 persen.

                Manajemen Haryanto juga memiliki tradisi untuk memberangkatkan para anak buahnya untuk melaksanakan haji/umrah yang masih tetap dipertahankan hingga sekarang.
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