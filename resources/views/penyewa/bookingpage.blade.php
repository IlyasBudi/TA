@extends('penyewa.layouts.app')

@section('title', 'Welcome')

@section('content')

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
    position: absolute;
    /* width: 33.3333%; */
    /* height: 100%; */
    width: 100%;
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
    background-image: url('https://docs.mapbox.com/help/demos/gl-store-locator/marker.png');
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

                    <div class="sidebar-map">
                      <div class="heading-map">
                        <h1 id="heading-title-map">Our locations</h1>
                      </div>
                      <div id="listings" class="listings"></div>
                    </div>
                    <div id="map" class="map"></div>
    
                    {{-- <div class="col-12">
                      <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
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
      mapboxgl.accessToken = 'pk.eyJ1IjoiaWx5YXMzMTciLCJhIjoiY2x4cTZ0cWwzMHdldTJxcHhhOXIyN2kxNyJ9.C-3yBGAZdbHayDe8ivXnfQ';

      /**
       * Add the map to the page
       */
      const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v11',
        center: [-77.034084142948, 38.909671288923],
        zoom: 13,
        scrollZoom: false
      });

      const stores = {
        'type': 'FeatureCollection',
        'features': [
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.034084142948, 38.909671288923]
            },
            'properties': {
              'phoneFormatted': '(202) 234-7336',
              'phone': '2022347336',
              'address': '1471 P St NW',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'at 15th St NW',
              'postalCode': '20005',
              'state': 'D.C.'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.049766, 38.900772]
            },
            'properties': {
              'phoneFormatted': '(202) 507-8357',
              'phone': '2025078357',
              'address': '2221 I St NW',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'at 22nd St NW',
              'postalCode': '20037',
              'state': 'D.C.'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.043929, 38.910525]
            },
            'properties': {
              'phoneFormatted': '(202) 387-9338',
              'phone': '2023879338',
              'address': '1512 Connecticut Ave NW',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'at Dupont Circle',
              'postalCode': '20036',
              'state': 'D.C.'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.0672, 38.90516896]
            },
            'properties': {
              'phoneFormatted': '(202) 337-9338',
              'phone': '2023379338',
              'address': '3333 M St NW',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'at 34th St NW',
              'postalCode': '20007',
              'state': 'D.C.'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.002583742142, 38.887041080933]
            },
            'properties': {
              'phoneFormatted': '(202) 547-9338',
              'phone': '2025479338',
              'address': '221 Pennsylvania Ave SE',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'btwn 2nd & 3rd Sts. SE',
              'postalCode': '20003',
              'state': 'D.C.'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-76.933492720127, 38.99225245786]
            },
            'properties': {
              'address': '8204 Baltimore Ave',
              'city': 'College Park',
              'country': 'United States',
              'postalCode': '20740',
              'state': 'MD'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.097083330154, 38.980979]
            },
            'properties': {
              'phoneFormatted': '(301) 654-7336',
              'phone': '3016547336',
              'address': '4831 Bethesda Ave',
              'cc': 'US',
              'city': 'Bethesda',
              'country': 'United States',
              'postalCode': '20814',
              'state': 'MD'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.359425054188, 38.958058116661]
            },
            'properties': {
              'phoneFormatted': '(571) 203-0082',
              'phone': '5712030082',
              'address': '11935 Democracy Dr',
              'city': 'Reston',
              'country': 'United States',
              'crossStreet': 'btw Explorer & Library',
              'postalCode': '20190',
              'state': 'VA'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.10853099823, 38.880100922392]
            },
            'properties': {
              'phoneFormatted': '(703) 522-2016',
              'phone': '7035222016',
              'address': '4075 Wilson Blvd',
              'city': 'Arlington',
              'country': 'United States',
              'crossStreet': 'at N Randolph St.',
              'postalCode': '22203',
              'state': 'VA'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-75.28784, 40.008008]
            },
            'properties': {
              'phoneFormatted': '(610) 642-9400',
              'phone': '6106429400',
              'address': '68 Coulter Ave',
              'city': 'Ardmore',
              'country': 'United States',
              'postalCode': '19003',
              'state': 'PA'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-75.20121216774, 39.954030175164]
            },
            'properties': {
              'phoneFormatted': '(215) 386-1365',
              'phone': '2153861365',
              'address': '3925 Walnut St',
              'city': 'Philadelphia',
              'country': 'United States',
              'postalCode': '19104',
              'state': 'PA'
            }
          },
          {
            'type': 'Feature',
            'geometry': {
              'type': 'Point',
              'coordinates': [-77.043959498405, 38.903883387232]
            },
            'properties': {
              'phoneFormatted': '(202) 331-3355',
              'phone': '2023313355',
              'address': '1901 L St. NW',
              'city': 'Washington DC',
              'country': 'United States',
              'crossStreet': 'at 19th St',
              'postalCode': '20036',
              'state': 'D.C.'
            }
          }
        ]
      };

      /**
       * Assign a unique id to each store. You'll use this `id`
       * later to associate each point on the map with a listing
       * in the sidebar.
       */
      stores.features.forEach((store, i) => {
        store.properties.id = i;
      });

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
          bbox: [-77.210763, 38.803367, -76.853675, 39.052643]
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
          /* Assign the `item` class to each listing for styling. */
          listing.className = 'item';

          /* Add the link to the individual listing created above. */
          const link = listing.appendChild(document.createElement('a'));
          link.href = '#';
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
            `<h3>Sweetgreen</h3><h4>${currentFeature.properties.address}</h4>`
          )
          .addTo(map);
      }
    </script>
@endpush