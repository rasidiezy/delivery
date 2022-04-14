<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <style>
        #map {
            width: 100%;
            height: 480px;
        }

    </style>
    <title>Buntok Delivery</title>
</head>

<body>
    @include('components.navbar')

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script>
        $("#confirmPosition").on("click", function() {
            $('#submit').prop("disabled", false);
            $("#onClickPositionView").removeClass("hidden");
            $("#alertWarning").addClass("hidden");
        });
    </script>

    <script>
        // Get element references
        var confirmBtn = document.getElementById('confirmPosition');
        var onClickPositionView = document.getElementById('onClickPositionView');
        var onIdlePositionView = document.getElementById('onIdlePositionView');
        var latitude = document.getElementById('latitude').value;
        var longitude = document.getElementById('longitude').value;


        // Initialize locationPicker plugin
        // var lp = new locationPicker('map', options);

        var lp = new locationPicker('map', {
            lat: latitude,
            lng: longitude,
            setCurrentPosition: true, // You can omit this, defaults to true
        }, {
            zoom: 17 // You can set any google map options here, zoom defaults to 15
        });

        // Listen to button onclick event
        confirmBtn.onclick = function() {
            $("#onClickPositionView").removeClass("hidden");
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            onClickPositionView.innerHTML = 'Lokasi mitra telah dikunci: ' + location.lat + ',' + location.lng;
            document.getElementById('latitude').value = location.lat;
            document.getElementById('longitude').value = location.lng;
        };

        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function(event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            onIdlePositionView.innerHTML = +location.lat + ',' + location.lng;
            latitude = location.lat;
            longitude = location.lng;
            initialize()
        });


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
            }, function(results, status) {
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
    </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        console.log(name);
        event.preventDefault();
        swal({
                title: name,
                text: "Apakah anda yakin ingin menghapus data?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

</html>
