@extends('layout.app')

@section('content')
    <div class="jumbotron jumbotron-fluid text-center ">
        <div class="container ">
            <h1 class="display-4">Buntok Delivery</h1>
        </div>
    </div>
    <div class="container-svg">
        <svg xmlns="http://www.w3.org/2000/svg" class="svg-success" viewBox="0 0 24 24">
            <g stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                <circle class="success-circle-outline" cx="12" cy="12" r="11.5" />
                <circle class="success-circle-fill" cx="12" cy="12" r="11.5" />
                <polyline class="success-tick" points="17,8.5 9.5,15.5 7,13" />
            </g>
        </svg>
    </div>
    <input id='nama' type='hidden' value='{{ ucwords(trans($nama)) }}'>
    <input id='ltuser' type='hidden' value='{{ $ltuser }}'>
    <input id='lguser' type='hidden' value='{{ $lguser }}'>
    <input id='detail' type='hidden' value='{{ ucwords(trans($detail)) }}'>
    <input id='alamat' type='hidden' value='{{ ucwords(trans($alamat)) }}'>
    <input id='nohp' type='hidden' value='{{ $nohp }}'>
    <input id='reqorder' type='hidden' value="{{ ucwords(trans($reqorder ?: 'Tidak Ada')) }} ">
    <input id='jarak' type='hidden' value='{{ $jarak }}'>
    <input id='ongkir' type='hidden' value='{{ $ongkir }}'>
    <input id='biayarq' type='hidden' value='{{ $biayarq ?: 0 }}'>
    <input id='potonganDiskon' type='hidden' value='{{ $potongandiskon ?: 0 }}'>
    <input id='total' type='hidden' value='{{ $total }}'>
    <input id='ltmitra' type='hidden' value='{{ $mitra->latitude }}'>
    <input id='lgmitra' type='hidden' value='{{ $mitra->longitude }}'>
    <input id='namamitra' type='hidden' value='{{ ucwords(trans($mitra->nama)) }}'>
    <div class="info-success">

        <h2 class="text-center ">Yay, order anda berhasil</h2>
        <p class="text-center">Mohon menunggu beberapa detik anda akan segera diarahkan ke Whatsapp.</p>
    </div>
    <div class="text-center mb-3">
        <button class="btn btn-primary btn-lg" role="button" onclick="gotowhatsapp();">KLIK DISINI JIKA BELUM DIARAHKAN
            DALAM BEBERAPA DETIK</button>
    </div>


    <script>
        window.onload = function() {
            setInterval(function() {
                gotowhatsapp();
            }, 3000);
        };

        //      $(window).on('load', function () {
        //       alert("Window Loaded");
        //  });
        // function loadWhatsapp() {
        //   alert("Whatsapp is loaded");
        // }
    </script>
@endsection
