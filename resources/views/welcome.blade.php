@extends('layout.app')

@section('content')
<section>

    <div class="jumbotron jumbotron-fluid text-center ">
        <div class="container ">
            <h1 class="display-4">Buntok Delivery</h1>
        </div>
    </div>
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap mb-4 mt-2">
                <h2 class="text-header">
                    #PianMagerUlunAnter
                </h2>
            </div>
            <div class="col-lg-12 col-12 header-wrap mb-3">
                <h3 class="text-header">
                    Pesan Sekarang
                </h3>
            </div>
        </div>
     
        <div class="row col-sm-6 offset-sm-3 margin-padding">
            <div class=" col-lg-12 col-12 margin-padding">
                <div class="row">
                </div>
                
                <div>
               
                    <form action="#" id="test" class="basic-form" method="post">
                        @csrf
                        <input id="lat" type="hidden" value="">
                        <input id="long" type="hidden" value="">
                    
                        <div class="form-group mb-3">
                            <!--<h4 id="msg"></h4>-->
                                 <!--<p id="msg"></p>-->
                            <label class="form-label">Nama </label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class=" form-group mb-3">
                            <label class="form-label">Tujuan Pickup</label>
                        <select id="tujuanPickup" class="form-control selectpicker" data-live-search="true" required>
                            <option value="">--Silahkan Pilih--</option>
                            @foreach ($mitra as $item)
                            <option data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}" data-subtext="{{Str::limit($item->alamat, 30)}}" value="{{ $item->nama }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Detail Pesanan</label>
                            <input type="text" name="detail" class="form-control" required>
                        </div>

                        <div class="checkbox form-group mb-3">
                            <label>
                                <input id="chkRead" class="class="form-check-input" type="checkbox" name="chkRead" for="chkRead">Berat (centang untuk ubah)</label>
                            <input name="berat" type="text" readonly id="berat" value="1" class="form-control" />
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label mb-1">Alamat Saya</label>
                           
                            <button class="button-61 btn-sm mb-1" id="btnAlamat" onclick="getLocation();"
                                role="button">Lokasi Saya</button>
                            <input id="alamat" type="text" name="alamat" class="form-control" readonly required>
                            <small id="passwordHelpBlock" class="form-text text-muted hided">Silahkan ubah alamat apabila kurang jelas.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="checkbox form-group mb-2">
                            <label>
                                <input id="addOrder1" type="checkbox" name="ch_name[]" value="ch01">Permintaan Pesanan Tambahan
                            </label>
                            <input type="text" name="ch_for[]" placeholder="Contoh: Belanja ke Alfamart"
                                class="form-control ch_for hides">
                        </div>
                </div>
                <div class="row mb-5">
                       
                    <table class="table">
                        <tbody>
                        <div class="container ongkir">
                              <div class="row">
                                <div class="col">
                                 <h4 class="cli1">Jarak</h4>
                                      <button data-toggle="modal" data-target="#myModal" name="btnRute" class="button-61 btn-sm hided ml-2" id="btnRute" role="button" disabled>Lihat Rute</button>
                                </div>
                                <div class="col">
                                   <h4 class="cla1" id="jarak1"></h4>
                                </div>
                              </div>
                              <div class="container ongkir">
                              <div class="row">
                                <div class="col">
                                <h4 class="cli">Ongkir Pengantaran</h4>
                                </div>
                                <div class="col">
                                   <h4 class="cla">
                                        5000 </h4>
                                </div>
                              </div>
                              </div>
                               <div class="container ongkir">
                              <div class="row">
                                <div class="col">
                               <h4 class="cli">Pesanan Tambahan</h4>
                                </div>
                                <div class="col">
                                    <h4 class="cla addOrder">0
                                </div>
                              </div>
                              </div>
                               <div class="container ongkir">
                              <div class="row">
                                <div class="col">
                                 <h4 class="cli"> <strong>TOTAL</strong></h4>
                                </div>
                                <div class="col">
                                    <h4 class="cla">
                                        <strong>5000</strong>
                                    </h4>
                                </div>
                              </div>
                              </div>
                              

                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="button-61 btn-sm " role="button">Pesan Sekarang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rute Pengantaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="map"></div>
      </div>
      <div class="modal-footer">
      <div class="note-modal mr-auto">
        <p><em> <strong>Note:</strong></em></p>
          <p><em> <strong>A</strong> = Titik lokasi pickup.</em></p>
            <p><em> <strong>B</strong> = Titik lokasi anda.</em></p>
        </div>
        <button type="button" class=" mt-2 button-close-modal d-flex align-items-end" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">TUTUP</span></button>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
