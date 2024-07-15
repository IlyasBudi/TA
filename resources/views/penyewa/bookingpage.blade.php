@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@push('before-style')

  <link
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700"
  rel="stylesheet"
  />
  <!-- Mapbox GL JS -->
  <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
  <link
  href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css"
  rel="stylesheet"
  />
  <!-- Geocoder plugin -->
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.1-dev/mapbox-gl-geocoder.min.js"></script>
  <link
  rel="stylesheet"
  href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.1-dev/mapbox-gl-geocoder.css"
  type="text/css"
  />
  <!-- Turf.js plugin -->
  <script src="https://npmcdn.com/@turf/turf/turf.min.js"></script>
  <style>
  body {
    color: #404040;
    -webkit-font-smoothing: antialiased;
  }

  * {
    box-sizing: border-box;
  }

  .sidebar-map {
    /* position: relative; */
    position: absolute;
    /* width: 33.3333%; */
    /* height: 100%; */
    width: 30%;
    height: 400px;
    top: 0;
    left: 0;
    overflow: hidden;
    border-right: 1px solid rgb(0 0 0 / 25%);
  }

  .pad2 {
    padding: 20px;
  }

  .map {
    position: absolute;
    left: 33.3333%;
    width: 66.6666%;
    top: 0;
    bottom: 0;
  }

  

  a {
    color: #404040;
    text-decoration: none;
  }

  a:hover {
    color: #101010;
  }

  .heading-map {
    background: #fff;
    border-bottom: 1px solid #eee;
    min-height: 60px;
    line-height: 60px;
    padding: 0 10px;
    background-color: #00853e;
    color: #fff;
  }

  #heading-title-map {
    font-size: 22px;
    margin: 0;
    font-weight: 400;
    line-height: 20px;
    padding: 20px 2px;
  }

  .listings {
    height: 100%;
    overflow: auto;
    padding-bottom: 60px;
  }

  .listings .item {
    border-bottom: 1px solid #eee;
    padding: 10px;
    text-decoration: none;
  }

  .listings .item:last-child {
    border-bottom: none;
  }

  .listings .item .title {
    display: block;
    color: #00853e;
    font-weight: 700;
  }

  .listings .item .title small {
    font-weight: 400;
  }

  .listings .item.active .title,
  .listings .item .title:hover {
    color: #8cc63f;
  }

  .listings .item.active {
    background-color: #f8f8f8;
  }

  ::-webkit-scrollbar {
    width: 3px;
    height: 3px;
    border-left: 0;
    background: rgb(0 0 0 / 10%);
  }

  ::-webkit-scrollbar-track {
    background: none;
  }

  ::-webkit-scrollbar-thumb {
    background: #00853e;
    border-radius: 0;
  }

  .marker {
    border: none;
    cursor: pointer;
    height: 56px;
    width: 56px;
    /* background-image: url('https://docs.mapbox.com/help/demos/gl-store-locator/marker.png'); */
    background-image: url('{{ asset('assets/images/baru/marker.svg') }}');
  }

  /* Marker tweaks */
  .mapboxgl-popup {
    padding-bottom: 50px;
  }

  .mapboxgl-popup-close-button {
    display: none;
  }

  .mapboxgl-popup-content {
    font:
      400 15px/22px 'Source Sans Pro',
      'Helvetica Neue',
      sans-serif;
    padding: 0;
    width: 180px;
  }

  .mapboxgl-popup-content h3 {
    background: #91c949;
    color: #fff;
    margin: -15px 0 0;
    padding: 10px;
    border-radius: 3px 3px 0 0;
    font-weight: 700;
  }

  .mapboxgl-popup-content h4 {
    margin: 0;
    padding: 10px;
    font-weight: 400;
  }

  .mapboxgl-popup-content div {
    padding: 10px;
  }

  .mapboxgl-popup-anchor-top > .mapboxgl-popup-content {
    margin-top: 15px;
  }

  .mapboxgl-popup-anchor-top > .mapboxgl-popup-tip {
    border-bottom-color: #91c949;
  }

  .mapboxgl-ctrl-geocoder {
    border-radius: 0;
    position: relative;
    top: 0;
    width: 800px;
    margin-top: 0;
    border: 0;
  }

  .mapboxgl-ctrl-geocoder > div {
    min-width: 100%;
    margin-left: 0;
  }
  </style>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
          <div class="container">
            <div class="row d-flex justify-content-center text-center">
              <div class="col-lg-10">
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

                    <label class="label-form">Lokasi Keberangkatan</label>
                    <div class="sidebar-map">
                      <div class="heading-map">
                        <h1 id="heading-title-map">Our locations</h1>
                      </div>
                      <div id="listings" class="listings"></div>
                    </div>
                    <div id="map" class="map"></div>

                    {{-- <label class="label-form">Search Result</label>
                    <input type="text" class="form-control" name="search-hasil" placeholder="" required> --}}

                    
                    
                    {{-- <div class="col-12">
                      <label class="label-form">Kategori Seat</label>
                      <select class="form-select" name="category_bus_id" id='category_bus_id'>
                        <option selected>Pilih Kategori</option>
                        @foreach ($categorybus as $categorybus)
                        <option value="{{ $categorybus->id }}">{{ $categorybus->name }}</option>
                        @endforeach
                      </select>
                    </div> --}}

                    {{-- <div class="col-12">
                      <label class="label-form">Bus</label>
                      <select name="bus_id" id='bus_id'>
                        <option selected>Pilih Bus</option>
                        @foreach ($bus as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                        @endforeach
                        
                      </select>
                    </div> --}}

                    {{-- <div class="col-12">
                      <label class="label-form">Bus</label>
                      <select name="bus_id" id='bus_id'>
                        <option selected>Pilih Bus</option>
                        @foreach ($bus as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                        @endforeach
                      </select>
                    </div> --}}
    
                    
    
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
    
@endsection

@push('after-script')
<script>
      mapboxgl.accessToken = 'pk.eyJ1IjoiaWx5YXMzMTciLCJhIjoiY2x4cTd2YXN6MHR2bzJqc2g5ZnJzbzBhcSJ9.4C6RKZ06Bi7b-l5tYqwfQg';

      /**
       * Add the map to the page
       */
      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [106.6428825914336, -6.223011844553948],
        // center: [106.6384, -6.1785], // tangerang
        // center: [106.64246, -6.22345], //haryanto
        // center: [-77.034084142948, 38.909671288923], //default mapbox
        zoom: 14,
        scrollZoom: true,
        
      });

      const stores = {
        'type': 'FeatureCollection',
        'features': [
          @foreach ($kantorcabang as $kantorcabang)

          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [{{  $kantorcabang->location }}]
            },
            'properties': {
              'id': {{ $kantorcabang->id }},
              'phoneFormatted': '{{ $kantorcabang->location }}',
              'address': '{{ $kantorcabang->name }}',
              'city': '{{ $kantorcabang->address }}',
            }
          },
          @endforeach
        ]
      };

      /**
       * Assign a unique id to each store. You'll use this `id`
       * later to associate each point on the map with a listing
       * in the sidebar.
       */
      // stores.features.forEach((store, i) => {
      //   store.properties.id = i;
      // });
      

      /**
       * Wait until the map loads to make changes to the map.
       */
      map.on('load', () => {
        /**
         * This is where your '.addLayer()' used to be, instead
         * add only the source without styling a layer
         */
        map.addSource('places', {
          'type': 'geojson',
          'data': stores
        });

        /**
         * Create a new MapboxGeocoder instance.
         */
        const geocoder = new MapboxGeocoder({
          accessToken: mapboxgl.accessToken,
          mapboxgl: mapboxgl,
          marker: true,
          // bbox: [106.339279, -6.362826, 106.748612, -5.9730956] //tangerang
          bbox: [50.48739, -24.81795, 170.70420, 18.51626] //pulau jawa
          // bbox: [-77.210763, 38.803367, -76.853675, 39.052643] //default mapbox
        });

        /**
         * Add all the things to the page:
         * - The location listings on the side of the page
         * - The search box (MapboxGeocoder) onto the map
         * - The markers onto the map
         */
        buildLocationList(stores);
        map.addControl(geocoder, 'top-left');
        addMarkers();

        /**
         * Listen for when a geocoder result is returned. When one is returned:
         * - Calculate distances
         * - Sort stores by distance
         * - Rebuild the listings
         * - Adjust the map camera
         * - Open a popup for the closest store
         * - Highlight the listing for the closest store.
         */
        geocoder.on('result', (event) => {
          /* Get the coordinate of the search result */
          const searchResult = event.result.geometry;

          /**
           * Calculate distances:
           * For each store, use turf.disance to calculate the distance
           * in miles between the searchResult and the store. Assign the
           * calculated value to a property called `distance`.
           */
          const options = { units: 'miles' };
          for (const store of stores.features) {
            store.properties.distance = turf.distance(
              searchResult,
              store.geometry,
              options
            );
          }

          /**
           * Sort stores by distance from closest to the `searchResult`
           * to furthest.
           */
          stores.features.sort((a, b) => {
            if (a.properties.distance > b.properties.distance) {
              return 1;
            }
            if (a.properties.distance < b.properties.distance) {
              return -1;
            }
            return 0; // a must be equal to b
          });

          /**
           * Rebuild the listings:
           * Remove the existing listings and build the location
           * list again using the newly sorted stores.
           */
          const listings = document.getElementById('listings');
          while (listings.firstChild) {
            listings.removeChild(listings.firstChild);
          }
          buildLocationList(stores);

          /* Open a popup for the closest store. */
          createPopUp(stores.features[0]);

          /** Highlight the listing for the closest store. */
          const activeListing = document.getElementById(
            `listing-${stores.features[0].properties.id}`
          );
          activeListing.classList.add('active');

          /**
           * Adjust the map camera:
           * Get a bbox that contains both the geocoder result and
           * the closest store. Fit the bounds to that bbox.
           */
          const bbox = getBbox(stores, 0, searchResult);
          map.fitBounds(bbox, {
            padding: 100
          });
        });
      });

      /**
       * Using the coordinates (lng, lat) for
       * (1) the search result and
       * (2) the closest store
       * construct a bbox that will contain both points
       */
      function getBbox(sortedStores, storeIdentifier, searchResult) {
        const lats = [
          sortedStores.features[storeIdentifier].geometry.coordinates[1],
          searchResult.coordinates[1]
        ];
        const lons = [
          sortedStores.features[storeIdentifier].geometry.coordinates[0],
          searchResult.coordinates[0]
        ];
        const sortedLons = lons.sort((a, b) => {
          if (a > b) {
            return 1;
          }
          if (a.distance < b.distance) {
            return -1;
          }
          return 0;
        });
        const sortedLats = lats.sort((a, b) => {
          if (a > b) {
            return 1;
          }
          if (a.distance < b.distance) {
            return -1;
          }
          return 0;
        });
        return [
          [sortedLons[0], sortedLats[0]],
          [sortedLons[1], sortedLats[1]]
        ];
      }

      /**
       * Add a marker to the map for every store listing.
       **/
      function addMarkers() {
        /* For each feature in the GeoJSON object above: */
        for (const marker of stores.features) {
          /* Create a div element for the marker. */
          const el = document.createElement('div');
          /* Assign a unique `id` to the marker. */
          el.id = `marker-${marker.properties.id}`;
          /* Assign the `marker` class to each marker for styling. */
          el.className = 'marker';

          /**
           * Create a marker using the div element
           * defined above and add it to the map.
           **/
          new mapboxgl.Marker(el, { offset: [0, -23] })
            .setLngLat(marker.geometry.coordinates)
            .addTo(map);

          /**
           * Listen to the element and when it is clicked, do three things:
           * 1. Fly to the point
           * 2. Close all other popups and display popup for clicked store
           * 3. Highlight listing in sidebar (and remove highlight for all other listings)
           **/
          el.addEventListener('click', (e) => {
            flyToStore(marker);
            createPopUp(marker);
            const activeItem = document.getElementsByClassName('active');
            e.stopPropagation();
            if (activeItem[0]) {
              activeItem[0].classList.remove('active');
            }
            const listing = document.getElementById(
              `listing-${marker.properties.id}`
            );
            listing.classList.add('active');
          });
        }
      }

      /**
       * Add a listing for each store to the sidebar.
       **/
      
      function buildLocationList(stores) {
        for (const store of stores.features) {
          /* Add a new listing section to the sidebar. */
          const listings = document.getElementById('listings');
          const listing = listings.appendChild(document.createElement('div'));
          /* Assign a unique `id` to the listing. */
          listing.id = `listing-${store.properties.id}`;
          // listing.id = `listing-${$kantorcabang_id}`;
          /* Assign the `item` class to each listing for styling. */
          listing.className = 'item';
          
    
          /* Add the link to the individual listing created above. */
          const link = listing.appendChild(document.createElement('a'));
          link.href = `/bookingpage/${store.properties.id}`;
          // link.href = `/kantorcabang/{{ $kantorcabang->id }}`;
          link.className = 'title';
          link.id = `link-${store.properties.id}`;
          link.innerHTML = `${store.properties.address}`;

          /* Add details to the individual listing. */
          const details = listing.appendChild(document.createElement('div'));
          details.innerHTML = `${store.properties.city}`;
          if (store.properties.phone) {
            details.innerHTML += ` &middot; ${store.properties.phoneFormatted}`;
          }
          if (store.properties.distance) {
            const roundedDistance =
              Math.round(store.properties.distance * 100) / 100;
            details.innerHTML += `<div><strong>${roundedDistance} miles away</strong></div>`;
          }

          /**
           * Listen to the element and when it is clicked, do four things:
           * 1. Update the `currentFeature` to the store associated with the clicked link
           * 2. Fly to the point
           * 3. Close all other popups and display popup for clicked store
           * 4. Highlight listing in sidebar (and remove highlight for all other listings)
           **/
          link.addEventListener('click', function () {
            for (const feature of stores.features) {
              if (this.id === `link-${feature.properties.id}`) {
                flyToStore(feature);
                createPopUp(feature);

                // Kirim request AJAX ke server
                fetch('/kantorcabang/data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // CSRF token diperlukan oleh Laravel
                    },
                    body: JSON.stringify({ id: kantorcabang_id })
                })
                .then(response => response.json())
                .then(data => {
                console.log('Success:', data);
                if (data.success) {
                    // Contoh: Tampilkan nama kantor cabang
                    document.getElementById('namaKantorCabang').innerText = data.data.nama;
                    // Anda bisa menambahkan lebih banyak logika di sini untuk menampilkan data lainnya
                } else {
                    console.error('Data tidak ditemukan');
                }
                // ..
                });
              }
            }
            const activeItem = document.getElementsByClassName('active');
            if (activeItem[0]) {
              activeItem[0].classList.remove('active');
            }
            this.parentNode.classList.add('active');
            
          });
        }
      }
      

      /**
       * Use Mapbox GL JS's `flyTo` to move the camera smoothly
       * a given center point.
       **/
      function flyToStore(currentFeature) {
        map.flyTo({
          center: currentFeature.geometry.coordinates,
          zoom: 15
        });
      }

      /**
       * Create a Mapbox GL JS `Popup`.
       **/
      function createPopUp(currentFeature) {
        const popUps = document.getElementsByClassName('mapboxgl-popup');
        if (popUps[0]) popUps[0].remove();

        const popup = new mapboxgl.Popup({ closeOnClick: false })
          .setLngLat(currentFeature.geometry.coordinates)
          .setHTML(
            `<h3>Kantor Cabang</h3><h4>${currentFeature.properties.address}</h4>`
          )
          .addTo(map);
      }
    </script>

    <script>
      // Contoh: Misalkan nilai searchResult didapatkan dari sebuah proses atau fungsi
      const searchResult = `${searchResult}`; // Nilai yang ingin ditampilkan

      // Pilih elemen input berdasarkan nama
      const searchInput = document.querySelector('input[name="search-hasil"]');

      // Atur nilai input dengan searchResult
      searchInput.value = searchResult;

      document.addEventListener('DOMContentLoaded', (event) => {
          const searchResult = `${searchResult}`; // Nilai yang ingin ditampilkan
          const searchInput = document.querySelector('input[name="search-hasil"]');
          searchInput.value = searchResult;
      });
    </script>
@endpush