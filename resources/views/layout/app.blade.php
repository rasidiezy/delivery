<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <title>Document</title>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY&callback=initialize"
        async defer></script>
</head>

<body>

    @yield('content')


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

            });
        }

        function initialize() {
            var lat = latitude;
            var long = longitude;
            console.log(lat);
            console.log(long);
            var latlng = {
                lat: lat,
                lng: long
            };
            console.log(latlng);
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

    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

    <script>
        $(document).ready(function () {
            $('#btnAlamat').click(function () {
                $("input[name='alamat']").removeAttr("readonly");
            });

        });

    </script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
</body>

</html>
