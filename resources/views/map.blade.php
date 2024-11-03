<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Road Trip Planner | Map</title>
    {{-- https://roadtrippers.com/wp-content/uploads/2024/04/autopilot_travel2.webp --}}
    <!-- Fonts -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="https://pipeline.mediumra.re/assets/css/theme.css" rel="stylesheet" type="text/css" media="all" />
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <link href="/output.css" rel="stylesheet">
</head>
<body>

    <div class="layout layout-nav-side">
      <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">

        <a class="navbar-brand" href="/">
          <h3 class="text-white">Road Trip <small><b>Planner</b></small></h3>
        </a>
        <div class="d-flex align-items-center">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
          <ul class="navbar-nav d-lg-block">

            <li class="nav-item">
                <h3>Current Location: <b> {{ $getCityName }}, {{ $getCountry }}({{ $getLongtiude }}, {{ $getLatitude }})</b></h3>
            </li>
            <li class="nav-item">
                <div>
                    <div class="form-group">
                        <label for="" class="text-white">Destination</label>
                        <input type="search" readonly class="form-control text-dark form-control-dark" id="locationDisplay">
                    </div>
                </div>
                <small>Distance in Km: {{ $distanceKm }}, Distance in Minutes: {{ $times }}</small>
            </li>
            <li class="nav-item">
                <div>
                    <div class="form-group">
                        <label for="" class="text-white">Latitude</label>
                        <input type="search" readonly class="form-control text-dark form-control-dark" id="latDisplay">
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div>
                    <div class="form-group">
                        <label for="" class="text-white">Longitude</label>
                        <input type="search" readonly class="form-control text-dark form-control-dark" id="lngDisplay">
                    </div>
                </div>
            </li>
          </ul>
          <hr>
          <div class="d-none d-lg-block w-100">
            <span class="text-small text-muted">Pinned Locations</span>
            <ul class="nav nav-small flex-column mt-2">
              <li class="nav-item">
                <a href="nav-side-team.html" class="nav-link">Team Overview</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-project.html" class="nav-link">Project</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-task.html" class="nav-link">Single Task</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-kanban-board.html" class="nav-link">Kanban Board</a>
              </li>
            </ul>
            <hr>
          </div>
          <div class="d-none d-lg-block w-100">
            <span class="text-small text-muted">Reserved Hotels</span>
            <ul class="nav nav-small flex-column mt-2">
              <li class="nav-item">
                <a href="nav-side-team.html" class="nav-link">Team Overview</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-project.html" class="nav-link">Project</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-task.html" class="nav-link">Single Task</a>
              </li>
              <li class="nav-item">
                <a href="nav-side-kanban-board.html" class="nav-link">Kanban Board</a>
              </li>
            </ul>
            <hr>
          </div>

          <div>
            <div class="mt-2">
              <a class="btn btn-warning btn-block " href="/">
                Go back
              </a>
            </div>
          </div>
        </div>
    </div>

    <div class="main-container">

        <div class="container-fluid">
            <div class="h-screen w-full" id="map"></div>
        </div>
    </div>


    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/bootstrap.js"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- Autosize - resizes textarea inputs as user types -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/autosize.min.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/flatpickr.min.js"></script>
    <!-- Prism - displays formatted code boxes -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/prism.js"></script>
    <!-- Shopify Draggable - drag, drop and sort items on page -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/draggable.bundle.legacy.js"></script>
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/swap-animation.js"></script>
    <!-- Dropzone - drag and drop files onto the page for uploading -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/dropzone.min.js"></script>
    <!-- List.js - filter list elements -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/list.min.js"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="https://pipeline.mediumra.re/assets/js/theme.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <script>
        // getting the data in the local storage
        document.getElementById('locationDisplay').value = localStorage.getItem('location') || sessionStorage.getItem('location') || 'No location saved';
        document.getElementById('latDisplay').value = localStorage.getItem('lat') || sessionStorage.getItem('lat') || 'No latitude saved';
        document.getElementById('lngDisplay').value = localStorage.getItem('lng') || sessionStorage.getItem('lng') || 'No longitude saved';

        mapboxgl.accessToken = 'pk.eyJ1IjoiY29kZXdpdGhqYW1pZSIsImEiOiJjbTJ6MWF2aXUwODFpMmlzOGE1ZHd1M2VzIn0.TNLAGOATEFyNsKW_tm39TQ';

        const name = localStorage.getItem('location') || sessionStorage.getItem('location');
        const lat = parseFloat(localStorage.getItem('lat') || sessionStorage.getItem('lat'));
        const lng = parseFloat(localStorage.getItem('lng') || sessionStorage.getItem('lng'));

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [lng, lat],
            zoom: 15
        });

        // adding the searched destination on the map
        const popup = new mapboxgl.Popup({ closeOnClick: false })
            .setLngLat( [lng, lat])
            .setHTML('<h1>'+ name +'</h1>')
            .addTo(map);

        if (!isNaN(lat) && !isNaN(lng)) {
            new mapboxgl.Marker()
                .setLngLat([lng, lat])
                .addTo(map);
        } else {
            console.log('No valid coordinates found for marker placement.');
        }

        map.on('load', function () {
            //place object we will add our events to
            map.addSource('places',{
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': []
                }
            });
            //add place object to map
            map.addLayer({
                'id': 'places',
                'type': 'symbol',
                'source': 'places',
                'layout': {
                    'icon-image': ['get', 'icon'],
                    'icon-allow-overlap': true
                }
            });

            map.on('mouseenter', 'places', (e) => {
                // Change the cursor style as a UI indicator.
                map.getCanvas().style.cursor = 'pointer';

                // Copy coordinates array.
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                if (['mercator', 'equirectangular'].includes(map.getProjection().name)) {
                    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                    }
                }

                // Populate the popup and set its coordinates
                // based on the feature found.
                popup.setLngLat(coordinates).setHTML(description).addTo(map);
            });

            map.on('click', 'places', (e) => {
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description;
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
                });


                map.addControl(new mapboxgl.FullscreenControl());

                //Handle pointer styles
                map.on('mouseenter', 'places', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });
                map.on('mouseleave', 'places', () => {
                    map.getCanvas().style.cursor = '';
                });

            });


    </script>
</body>
</html>
