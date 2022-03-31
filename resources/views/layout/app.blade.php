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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <title>Document</title>

</head>

<body>
    {{-- @include('components.alert') --}}
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>


    {{-- Script Get Lat and Long When Select Option is Selected --}}
    <script>
        $(' #tujuanPickup').on('change', function () {
            // mendapatkan data length untuk membuat tombol lihat rute enable
            var subjectLength = $('#tujuanPickup').val().length;
          
            if (subjectLength > 0) {
              $("#btnRute").removeClass("disabled");
              $("#btnRute").addClass("active");
            } else {
             $("#btnRute").addClass("disabled");
             $("#btnRute").removeClass("active");
            }
         
            ltMitra = ($(this).find(':selected').data('lat'));
            lgMitra = ($(this).find(':selected').data('lng'));
            initMap();
        });
    </script>
    

        


    {{-- Script Show Input Request Order --}}
    <script>
    if(document.getElementById('addOrder1').checked) {
    $("#reqOrder").show();
} else {
    $("#reqOrder").hide();
}
    </script>
    
    <script>
          $(document).ready(function () {
            $('.basic-form .checkbox input:checkbox').on('click', function () {
                $(this).closest('.checkbox').find('.ch_for').toggle();
            })
        });
    </script>

    {{-- CHECKBOX BERAT --}}
    <!--<script>-->
    <!--    $(document).ready(function () {-->
    <!--        $("#chkRead").change(function () {-->
    <!--            if ($(this).is(":checked")) {-->
    <!--                $('#berat').removeAttr("readonly")-->
    <!--            } else {-->
    <!--                $('#berat').attr('readonly', true);-->
    <!--            }-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->

    {{-- Script Change Price if Additional Order is Checked --}}
    <script>
        $('#addOrder1').on('click', function () {
            var $addOrder1Check = $('#addOrder1').is(':checked');

            var text = '0';
            if ($addOrder1Check) {
                // $("input:text").val(5000);
                text = '5000';
            } else if ($(this).not(":checked")) {

                text = '0';
            }
            // $('.addOrder').html(text);
            document.getElementById('biayarq').value = text;
             addOrder = parseInt(text);
            hitungTotal();
        });

    </script>

    {{-- Script Delete Attr Readonly When Button My Location is Clicked --}}
    <script>
        $(document).ready(function () {
            $('#btnAlamat').click(function () {
          
                
                $("input[name='alamat']").removeAttr("readonly");
                $("#btnRute").removeClass("hided");
                $("#passwordHelpBlock").removeClass("hided");
                $(".loading-btn").removeClass("hided");
                //   $(".hitung-jarak").removeClass("hided");
                $(this).prop("disabled", true);
                $(".btn-txt").text("Mendapatkan lokasi...");


                setTimeout(() => {
                    $(".loading-btn").addClass("hided");
                    //  $(".hitung-jarak").addClass("hided");
                    // $(this).prop("disabled", false);
                    $(".btn-txt").text("LOKASI SAYA");
                }, 1000);
            });

        });

    </script>
    
     <script>
        $(document).ready(function () {
            $('#btnSubmit').click(function () {
                $(".loading-btna").removeClass("hided");
                
                $(".btn-txt1").text("Mohon menunggu..");


                setTimeout(() => {
                    $(".loading-btna").addClass("hided");
                    //  $(".hitung-jarak").addClass("hided");
                    // $(this).prop("disabled", false);
                    $(".btn-txt1").text("PESAN SEKARANG");
                }, 10000);
            });

        });

    </script>




    {{-- GET LOCATION AND CHANGE TO ADRESS --}}
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
            var latMitra = parseFloat(ltMitra);
            var lngMitra = parseFloat(lgMitra);


            // Get Latitude Longitude User
            var ltUser = latitude;
            var lgUser = longitude;

            // The map, centered on Central Park
            const center = {
                lat: -1.716282,
                lng: 114.8779677
            };
            const options = {
                zoom: 1,
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
                map: map,
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
                        window.alert('Rute tidak dapat ditentukan, Silahkan pilih tujuan pickup ' + status);
                        return;
                    } else {
                        directionsRenderer.setDirections(response); // Add route to the map
                        var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
                        if (!directionsData) {
                            window.alert('Rute tidak dapat ditentukan');
                            return;
                        } else {
                            replace = directionsData.distance.text.replace(",", ".");
                          

                            document.getElementById('jarak1').value = replace;

                            jarak = directionsData.distance.text;
                            
                            hitungOngkir();

                        }
                    }
                });

        }

    </script>

    <script>
        function hitungOngkir() {
            var jarak1 = jarak;
            jarak1 = jarak1.replace(",", ".");
            var explode = jarak1.split(" ", 1);
            var meter = parseFloat(explode) * 1000;
            var ongkir1 = meter * 2;

            if (ongkir1 < 5000) {
                ongkir1 = 5000;
                biaya = 5000;
                // document.getElementById('ongkir').value += 5000;
                // document.getElementById('total').innerHTML += ongkir1;
            } else {
                biaya = ongkir1;
                // document.getElementById('ongkir').value = ongkir1;
                // document.getElementById('ongkir2').innerHTML += ongkir1;.
                // document.getElementById('total').innerHTML += ongkir1;
            }

            document.getElementById('ongkir').value = parseInt(biaya);

            ongkir = ongkir1;

            hitungTotal();
        }

        function hitungTotal() {
            var ongkir2 = parseInt(ongkir);
            console.log(ongkir2);
           
            if( isNaN(ongkir2) ){
                ongkir2 = 0;
            }
            
            if (typeof addOrder == 'undefined') {
                addOrder = 0;
            } 
            
            total = ongkir2 + addOrder;

            document.getElementById('total').value = total;

        }

    </script>
    
     <script>
        function gotowhatsapp() {
        var ltuser = document.getElementById("ltuser").value;
        var lguser = document.getElementById("lguser").value;
        var ltmitra = document.getElementById("ltmitra").value;
        var lgmitra = document.getElementById("lgmitra").value;
        var name = document.getElementById("nama").value;
        var alamat = document.getElementById("alamat").value;
        var detail = document.getElementById("detail").value;
        var nohp = document.getElementById("nohp").value;
        var reqorder = document.getElementById("reqorder").value;
        var jarak = document.getElementById("jarak").value;
        var ongkir = document.getElementById("ongkir").value;
        var biayarq = document.getElementById("biayarq").value;
        var total = document.getElementById("total").value;
        var namamitra = document.getElementById("namamitra").value;
        
        // var lengthbrq = biayarq.length;
        // console.log(lengthbrq);
        
        var	ongkir_string = ongkir.toString(),
        	sisa 	= ongkir_string.length % 3,
        	rupiah 	= ongkir_string.substr(0, sisa),
        	ribuan 	= ongkir_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
        	separator = sisa ? '.' : '';
        	ongkira = rupiah + separator + ribuan.join('.');
            }  
            
            if (biayarq.length > 1) {
                    var	biayarq_string = biayarq.toString(),
                	sisa 	= biayarq_string.length % 3,
                	rupiah 	= biayarq_string.substr(0, sisa),
                	ribuan 	= biayarq_string.substr(sisa).match(/\d{3}/g);
                    if (ribuan) {
                	separator = sisa ? '.' : '';
                	biayarqa = rupiah + separator + ribuan.join('.');
                    } 
            }else {
                biayarqa = biayarq;
            }
         
            
            var	total_string = total.toString(),
        	sisa 	= total_string.length % 3,
        	rupiah 	= total_string.substr(0, sisa),
        	ribuan 	= total_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
        	separator = sisa ? '.' : '';
        	totala = rupiah + separator + ribuan.join('.');
            }
        
    
        var url = "https://wa.me/6285158580660?text=" 
        + "Halo saya baru saja memesan jasa pengantaran" + " *Buntok Delivery* " + "dengan detail pesanan sebagai berikut :" + "%0a" 
        + "%0a" 
        + "Nama: " + name + "%0a" 
        + "Detail Pesanan: " + detail  + "%0a"
        + "%0a" 
        + "Tujuan Pickup: " + namamitra + " (https://maps.google.com/?q="+ ltmitra + "," + lgmitra +")" + "%0a" 
        + "%0a"
        + "Tujuan Pengantaran: " +alamat + " (https://maps.google.com/?q="+ ltuser + "," + lguser +")" + "%0a"
        + "%0a"
        + "Pesanan Tambahan: " + reqorder  + "%0a"
        + "No HP: " + nohp  + "%0a"
        + "%0a"
        + "Jarak: " + jarak  + " Km" + "%0a"
        + "Ongkir Pengantaran: " + ongkira  + "%0a"
        + "Biaya Pesanan Tambahan: " + biayarqa   + "%0a"
        + "*TOTAL BIAYA PENGANTARAN: " + totala + "*" + "%0a"
       
     
        // window.open(url, '_blank').focus(); 
    
        window.location.href = url;
        }
    </script>




    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY&callback=initialize"
        async defer></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcNfPU5Xhy2zxtoZKfkLUnpJvtWLLozbY&callback=initMap">
    </script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>

</html>
