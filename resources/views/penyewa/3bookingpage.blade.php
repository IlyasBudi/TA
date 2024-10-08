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

@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            {{-- lebar --}}
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

                  <div class="sidebar-map">
                    <div class="heading-map">
                      <h1 id="heading-title-map">Our locations</h1>
                    </div>
                    <div id="listings" class="listings"></div>
                  </div>
                  <div id="map" class="map"></div>

  
                  
  
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
    mapboxgl.accessToken = 'pk.eyJ1IjoiZXhhbXBsZXMiLCJhIjoiY2p0MG01MXRqMW45cjQzb2R6b2ptc3J4MSJ9.zA2W0IkI0c6KaAhJfk9bWg';

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
    * Add all the things to the page:
    * - The location listings on the side of the page
    * - The markers onto the map
    */
    buildLocationList(stores);
    addMarkers();
    });

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
        /* Fly to the point */
        flyToStore(marker);
        /* Close all other popups and display popup for clicked store */
        createPopUp(marker);
        /* Highlight listing in sidebar */
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
@endpush