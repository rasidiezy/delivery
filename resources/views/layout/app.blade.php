<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            width: 600px;
        }

    </style>
    <title>Document</title>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY&callback=initialize"
        async defer></script>


    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>


</head>

<body>

    @yield('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    {{-- Script Get Lat and Long When Select Option is Selected --}}
    <script>
        $('.basic-form select').change(function () {
            ltMitra = ($(this).find(':selected').data('lat'));
            lgMitra = ($(this).find(':selected').data('lng'));
            initMap();
        });
    </script>

    {{-- Script Show Input Request Order --}}
    <script>
        $(document).ready(function () {
            $('.basic-form .checkbox input:checkbox').on('click', function () {
                $(this).closest('.checkbox').find('.ch_for').toggle();
            })
        });
    </script>

    {{-- CHECKBOX BERAT --}}
    <script>
        $(document).ready(function () {
            $("#chkRead").change(function () {
                if ($(this).is(":checked")) {
                    $('#berat').removeAttr("readonly")
                } else {
                    $('#berat').attr('readonly', true);
                }
            });
        });
    </script>

    {{-- Script Delete Attr Readonly When Button My Location is Clicked --}}
    <script>
        $(document).ready(function () {
            $('#btnAlamat').click(function () {
                $("input[name='alamat']").removeAttr("readonly");
            });

        });

    </script>

    {{-- GET LOCATION AND CHANGE TO ADRES --}}
    <script>
        function getLocation() {
            navigator.geolocation.getCurrentPosition(function (position) {
                var coordinates = position.coords;
                document.getElementById('lat').value = coordinates.latitude;
                document.getElementById('long').value = coordinates.longitude;
                latitude = coordinates.latitude;
                longitude = coordinates.longitude;
                initialize();
                initMap()
            });
        }

        function initialize() {
            var lat = latitude;
            var long = longitude;
            var latlng = {
                lat: lat,
                lng: long
            };
            var geocoder = new google.maps.Geocoder;
            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
                        rs = results[0].formatted_address;
                    } else {
                        rs = 'No results found';
                    }
                } else {
                    rs = 'Geocoder failed due to: ' + status;
                }
                document.getElementById('alamat').value = rs;
            });
        }



        // Initialize and add the map
        var map;

        function initMap() {
            // Get Latitude Longitude Mitra
            var latMitra = ltMitra;
            var lngMitra = lgMitra;
            console.log(latMitra);
            console.log(lngMitra);


            // Get Latitude Longitude User
            var ltUser = latitude;
            var lgUser = longitude;
            // The map, centered on Central Park
            const center = {
                lat: 40.774102,
                lng: -73.971734
            };
            const options = {
                zoom: 15,
                scaleControl: true,
                center: center
            };
            map = new google.maps.Map(
                document.getElementById('map'), options);
            // Locations of landmarks
            const mitra = {
                lat: latMitra,
                lng: lngMitra
            };
            const user = {
                lat: ltUser,
                lng: lgUser
            };
            // The markers for The mitra and The user Collection
            var mk1 = new google.maps.Marker({
                position: mitra,
                map: map
            });
            var mk2 = new google.maps.Marker({
                position: user,
                map: map
            });
            let directionsService = new google.maps.DirectionsService();
            let directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map); // Existing map object displays directions
            // Create route from existing points used for markers
            const route = {
                origin: mitra,
                destination: user,
                travelMode: 'DRIVING'
            }

            directionsService.route(route,
                function (response, status) { // anonymous function to capture directions
                    if (status !== 'OK') {
                        window.alert('Directions request failed due to ' + status);
                        return;
                    } else {
                        directionsRenderer.setDirections(response); // Add route to the map
                        var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
                        if (!directionsData) {
                            window.alert('Directions request failed');
                            return;
                        } else {
                            document.getElementById('msg').innerHTML += " Driving distance is " + directionsData
                                .distance.text + " (" + directionsData.duration.text + ").";
                        }
                    }
                });
        }

    </script>

   

    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY&callback=initMap">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>

</html>
