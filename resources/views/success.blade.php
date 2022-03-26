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
          <circle class="success-circle-outline" cx="12" cy="12" r="11.5"/>
          <circle class="success-circle-fill" cx="12" cy="12" r="11.5"/>
          <polyline class="success-tick" points="17,8.5 9.5,15.5 7,13"/>
        </g>
      </svg>
    </div>
    <div class="info-success">
          <h2 class="text-center ">Yay, order anda berhasil</h2>
          <p class="text-center">Mohon menunggu beberapa detik anda akan segera diarahkan ke Whatsapp.</p>
    </div>
    <div class="text-center mb-3">
      <button type="submit" class="btn btn-primary btn-lg" name="submit" role="button">KLIK DISINI JIKA BELUM DIARAHKAN DALAM BEBERAPA DETIK</button>
  </div>
@endsection