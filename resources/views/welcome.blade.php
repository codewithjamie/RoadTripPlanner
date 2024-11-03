<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Road Trip Planner</title>
        {{-- https://roadtrippers.com/wp-content/uploads/2024/04/autopilot_travel2.webp --}}
        <!-- Fonts -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="https://d19m59y37dris4.cloudfront.net/directory/2-0-2/img/favicon.png">
        <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/directory/2-0-2/vendor/nouislider/nouislider.css">
        <!-- Google fonts - Playfair Display-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
        <!-- Google fonts - Poppins-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700">
        <!-- swiper-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
        <!-- Magnigic Popup-->
        <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/directory/2-0-2/vendor/magnific-popup/magnific-popup.css">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/directory/2-0-2/css/style.default.2018ba20.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/directory/2-0-2/css/custom.0a822280.css">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
        <link href="/output.css" rel="stylesheet">
    </head>
    <body class="antialiased"  style="background-image:url(https://roadtrippers.com/wp-content/uploads/2024/04/autopilot_travel2.webp);">
        <div class="container-fluid" >
            <div class="pt-4 mt-4"></div>

            <div class="container pt-4 mt-4">
                <div class="container py-6 py-md-7 text-white z-index-20">
                    <div class="row">
                       <div class="col-xl-10">
                          <div class="text-center text-lg-start">
                             <p class="subtitle letter-spacing-4 mb-2 text-secondary text-shadow">A road trip planner </p>
                             <h1 class="display-3 fw-bold text-shadow text-dark">That plans your trip for you</h1>
                          </div>
                          <div class="search-bar mt-5 p-3 p-lg-1 ps-lg-4">
                             <form action="#">
                                <div class="row">
                                   <div class="col-lg-10 d-flex align-items-center form-group">
                                      {{-- <input class="form-control border-0 shadow-0" type="text" id="city" name="city" placeholder="Where would you like to explore?">
                                      <input type="hidden" id="longitude"  name="longitude" class="form-control">
                                      <input type="hidden" id="latitude"  name="latitude" class="form-control"> --}}

                                        <div id="geocoder"></div>
                                    </div>
                                   <div class="col-lg-2 d-grid">
                                      <button class="btn btn-outline-primary rounded-pill h-100" type="button" onclick="searchNow()">Go </button>
                                   </div>
                                </div>
                             </form>
                          </div>
                       </div>
                    </div>
                </div>
            </div>


            <div style="margin-top: 30%"></div>
            <div class="container card bg-dark">
                <div class="card-body pb-2 mb-4 pt-2 mt-4">
                    <footer class="text-center text-white">
                        <h4>Handcrafted by <a href="https://github.com/codewithjamie" class="text-warning" target="_blank">CodewithJamie</a>.</h4>
                    </footer>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiY29kZXdpdGhqYW1pZSIsImEiOiJjbTJ6MWF2aXUwODFpMmlzOGE1ZHd1M2VzIn0.TNLAGOATEFyNsKW_tm39TQ';

            const geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
            });

            geocoder.addTo('#geocoder');

            var geocoderResult = {};
            var placeName, LngCoordinates, LatCoordinates; // Declare variables globally

            geocoder.on('result', (e) => {
                geocoderResult = e.result;

                placeName = e.result.place_name; // Set global variables
                LngCoordinates = e.result.center[0];
                LatCoordinates = e.result.center[1];
            });

            function searchNow() {
                if (Object.keys(geocoderResult).length === 0) { // Use Object.keys to check if the object is empty
                    return false;
                }

                var postObj = {
                    location: placeName,
                    lat: LatCoordinates,
                    lng: LngCoordinates,
                }

                // setting up data in the local storage
                sessionStorage.setItem('location', placeName);
                sessionStorage.setItem('lat', LatCoordinates);
                sessionStorage.setItem('lng', LngCoordinates);


                $.ajax({
                    url: "{{ route('destinations.store') }}",
                    type: 'POST',
                    data: postObj,
                    dataType: "json",
                    success: function (resp) {
                        if (resp.success) {
                            window.location.href = resp.redirect;
                        }
                    },
                    error: function (e) {
                        console.log(e);
                    }
                });
            }

            // Clear results container when search is cleared.
            geocoder.on('clear', () => {
                geocoderResult = {};
                placeName = undefined; // Reset global variables
                LngCoordinates = undefined;
                LatCoordinates = undefined;
            });
        </script>

        {{-- <script>
            const script = document.getElementById('search-js');
            // wait for the Mapbox Search JS script to load before using it
            script.onload = function () {
                // instantiate a <mapbox-address-autofill> element using the MapboxAddressAutofill class
                const autofillElement = new mapboxsearch.MapboxAddressAutofill()

                autofillElement.accessToken = 'pk.eyJ1IjoiY29kZXdpdGhqYW1pZSIsImEiOiJjbTJ6MWF2aXUwODFpMmlzOGE1ZHd1M2VzIn0.TNLAGOATEFyNsKW_tm39TQ'

                const the_input = document.getElementById('city');
                const longitudeInput = document.getElementById('longitude');
                const latitudeInput = document.getElementById('latitude');
                const the_form = the_input.parentElement

                // append the <input> to <mapbox-address-autofill>
                autofillElement.appendChild(the_input);
                // append <mapbox-address-autofill> to the <form>
                the_form.appendChild(autofillElement);

                autofillElement.addEventListener('retrieve', (event) => {
                    const { result } = event.detail;

                    if (result && result.geometry) {
                        const coordinates = event.data.features[0].geometry.coordinates;
                        const [longitude, latitude] = coordinates;

                        // Set latitude and longitude in respective inputs
                        latitudeInput.value = latitude;
                        longitudeInput.value = longitude;

                        // Log coordinates to the console
                        console.log('Latitude:', latitude, 'Longitude:', longitude);
                    }
                });

            };
        </script> --}}
    </body>
</html>
