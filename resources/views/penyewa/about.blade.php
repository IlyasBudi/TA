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

    <section class="section about">
        <div class="container">

        <div class="about-content">

            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">PT HARYANTO MOTOR INDONESIA</h2>
            <ul class="about-list">
            
            <figure class="about-banner">
                <img src="{{ asset('/landingpagetemplate') }}/assets/images/baru/logo-hr.svg" width="510" height="138" loading="lazy" alt="" class="w-100">
            </figure>

            <li class="about-item">

                <div class="about-item-icon">
                <ion-icon name="caret-forward-outline"></ion-icon>
                </div>

                <div class="about-item-content">
                <h3 class="h3 card-title">Sejarah PO Haryanto</h3>
                <br>
                <p class="card-text">
                    PO Haryanto didirikan pada tahun 2002 oleh H. Haryanto asal Kudus, Jawa Tengah setelah purna bertugas di Batalyon Artileri Pertahanan Udara Ringan 1/Kostrad TNI Angkatan Darat di Tangerang. Sebelumnya, ia adalah seorang tentara yang memiliki berbagai pekerjaan sampingan, salah satunya adalah agen tiket bus.

                    Dengan mendapatkan pinjaman dari bank, ia membeli enam buah bus dan menggunakan armadanya tersebut untuk trayek perkotaan dengan rute Cikarang-Cimone.

                    Tetapi setelah beberapa waktu, rute tersebut dianggap kurang menguntungkan dikarenakan sepinya penumpang. Akhirnya ia mengubah armada tersebut menjadi kelas eksekutif dan mengalihkan trayeknya ke trayek antarkota dengan rute Jakarta-Kudus, Jakarta-Pati dan Jakarta-Jepara.

                    Mulai saat itulah perusahaan busnya mulai berkembang. Pada tahun 2009, PO Haryanto melakukan ekspansi bisnis pertamanya di luar Muria Raya dan juga di luar Pulau Jawa, yakni di Pulau Madura dengan trayek Jakarta-Pamekasan-Sumenep.

                    Tiga tahun kemudian tepatnya di tahun 2012, PO Haryanto kembali melakukan ekspansi bisnisnya, kali ini berada di jalur selatan jawa dengan trayek pertama yakni Jakarta-Solo-Ponorogo, serta kota-kota lain di sekitar Solo Raya seperti Klaten dan Gemolong.

                    Di tahun yang sama pula, PO Haryanto juga merintis trayek menuju Bojonegoro dan Purwodadi dengan bantuan adiknya, H. Annas. Saat ini, PO Haryanto telah melayani lebih dari 20 kota di Pulau Jawa dengan beberapa divisi.
                </p>
                </div>

            </li>

            <li class="about-item">

                <div class="about-item-icon">
                <ion-icon name="caret-forward-outline"></ion-icon>
                </div>

                <div class="about-item-content">
                <h3 class="h3 card-title">Ciri Khas</h3>
                <br>
                <p class="card-text">
                    Haryanto dikenal dengan penggunaan skema warna bodi bus yang beragam dan meriah, serta mengangkat potensi pariwisata Kudus. Masjid Menara Kudus menjadi ikon dari bus-bus Haryanto, ditempel pada bodi samping bus. Rian Mahendra selaku Direktur Operasional (pada waktu itu) mengatakan bahwa dalam menjalankan bisnisnya, Haryanto memanfaatkan filosofi "ilmu langit", maksudnya "nilai-nilai keagamaan Islam dijadikan acuan dalam berbisnis (bus)". Untuk mewujudkan misi korporatnya itu, kaligrafi sholawat "ṣalā-llāhu ʿala Muḥammad" ditempel di seluruh armada bus Haryanto.[3]

                    Sebagian armada (khususnya armada keluaran 2018 keatas) juga dilengkapi dengan gambar wayang kulit, biasanya bergambar Werkudara atau Rama dan Sinta.

                    Selain ciri khas dalam armada, Haryanto juga memiliki ciri khas dalam pelayanan. Seperti peraturan untuk berhenti melaksanakan ibadah sholat (hanya khusus untuk yang Muslim) ketika dalam perjalanan, atau uang tiket konsumen yang dimana akan disumbangkan kepada yang membutuhkan sebesar 2,5 persen.

                    Manajemen Haryanto juga memiliki tradisi untuk memberangkatkan para anak buahnya untuk melaksanakan haji/umrah yang masih tetap dipertahankan hingga sekarang.
                </p>
                </div>

            </li>

            </ul>

        </div>

        </div>
    </section>


      <!-- 
        - #POPULAR
      -->

      <section class="kaca" id="destination">
        <div class="container">

          <p class="section-subtitle">Temukan Kami</p>

          <h2 class="h2 section-title">Kantor Cabang</h2>

          <p class="section-text">
            Kunjungi kantor cabang kami yang tersebar di berbagai lokasi untuk mendapatkan informasi lengkap terkait pemesanan kaca.
          </p>
          @foreach ($kantorcabangs as $kantorcabang)
          <ul class="kaca-list">

            <li>
              <div class="kaca-card">

                <figure class="card-img">
                  <img src="{{ Storage::url($kantorcabang->image) }}" alt="{{ $kantorcabang->name }}" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">
                    <a href="/kantorcabang/{{ $kantorcabang->id }}">{{ $kantorcabang->name }}</a>
                  </h3>

                  <p class="card-text">
                    {{ $kantorcabang->address }}
                  </p>

                </div>

              </div>
            </li>

          </ul>
        @endforeach

        </div>
      </section>