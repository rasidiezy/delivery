<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!--DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" />
    <!--Daterangepicker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{-- <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet"> --}}
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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableMitra').DataTable({
                ordering: false,
                "language": {
                    "lengthMenu": "Tampil _MENU_ data",
                    "zeroRecords": "Maaf, Data tidak ditemukan",
                    "info": "Tampil halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data tersedia",
                    "infoFiltered": "(filter dari _MAX_ total data)"
                },
                "oLanguage": {
                    "sSearch": "Pencarian"
                }
            });
            // $('#example').DataTable({
            //     ordering: false
            // });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#exampleModal").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                var nama = $(e.relatedTarget).data('name');
                var alamat = $(e.relatedTarget).data('alamat');
                var tujuan = $(e.relatedTarget).data('tujuan');
                var detail = $(e.relatedTarget).data('detail');
                var nohp = $(e.relatedTarget).data('nohp');
                var rqorder = $(e.relatedTarget).data('rqorder');
                var biayarq = $(e.relatedTarget).data('biayarq');
                var jarak = $(e.relatedTarget).data('jarak');
                var ongkir = $(e.relatedTarget).data('ongkir');
                var diskon = $(e.relatedTarget).data('diskon');
                var total = $(e.relatedTarget).data('total');
                var waktu = $(e.relatedTarget).data('waktu');
                $('#pass_id').val(id);
                $('#name').val(nama);
                $('#alamat1').val(alamat);
                $('#detail').val(detail);
                $('#tujuan').val(tujuan);
                $('#nohp').val(nohp);
                $('#biayarq').val(biayarq);
                $('#jarak').val(jarak);
                if (rqorder.length == 0) {
                    $('#rqorder').val('Tidak Ada Pesanan Tambahan');
                } else {
                    $('#rqorder').val(rqorder);
                }
                $('#ongkir').val(ongkir);
                $('#diskon').val(diskon);
                $('#total').val(total);
                $('#waktu').val(waktu);
            });
        });
    </script>

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

<!--DataTables -->
{{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script> --}}
<!--DateRangePicker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    //fungsi untuk filtering data berdasarkan tanggal 
    var start_date;
    var end_date;
    var DateFilterFunction = (function(oSettings, aData, iDataIndex) {
        var dateStart = parseDateValue(start_date);
        var dateEnd = parseDateValue(end_date);
        //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
        //nama depan = 0
        //nama belakang = 1
        //tanggal terdaftar =2
        var evalDate = parseDateValue(aData[0]);
        if ((isNaN(dateStart) && isNaN(dateEnd)) ||
            (isNaN(dateStart) && evalDate <= dateEnd) ||
            (dateStart <= evalDate && isNaN(dateEnd)) ||
            (dateStart <= evalDate && evalDate <= dateEnd)) {
            return true;
        }
        return false;
    });

    // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona waktu browser
    function parseDateValue(rawDate) {
        var dateArray = rawDate.split("/");
        var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[
            0]); // -1 because months are from 0 to 11   
        return parsedDate;
    }

    $(document).ready(function() {
        //konfigurasi DataTable pada tabel dengan id example dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
        var $dTable = $('#example').DataTable({
            ordering: false,
            "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
        });

        //menambahkan daterangepicker di dalam datatables
        $("div.datesearchbox").html(
            '<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Cari berdasarkan tanggal.."> </div>'
        );

        document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

        //konfigurasi daterangepicker pada input dengan id datesearch
        $('#datesearch').daterangepicker({
            autoUpdateInput: false
        });

        //menangani proses saat apply date range
        $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format(
                'DD/MM/YYYY'));
            start_date = picker.startDate.format('DD/MM/YYYY');
            end_date = picker.endDate.format('DD/MM/YYYY');
            $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
            $dTable.draw();
        });

        $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            start_date = '';
            end_date = '';
            $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
            $dTable.draw();
        });
    });
</script>

</html>
