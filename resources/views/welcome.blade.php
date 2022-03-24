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
                    #SiapBehujanBepanas
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

                    <form action="{{ route('order.store') }}" id="test" class="basic-form" method="post">
                        @csrf

                        <div class="form-group mb-3">
                        <input id="lat" name="latitude" type="text" value="">
                        <input id="long" name="longitude" type="text" value="">
                        <input id="jarak1" name="jarak" type="text" value="">
                        <input id="ongkir" name="ongkir" type="text" value="">
                        <input id="total" name="total" type="text" value="">
                            <label class="form-label">Nama </label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class=" form-group mb-3">
                            <label class="form-label">Tujuan Pickup</label>
                            <select id="tujuanPickup" name="pickup_id" class="form-control selectpicker" data-live-search="true"
                                required>
                                <option value="">--Silahkan Pilih--</option>
                                @foreach ($mitra as $item)
                                <option data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}"
                                    data-subtext="{{Str::limit($item->alamat, 35)}}" value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Detail Pesanan</label>
                            <input type="text" name="detail" class="form-control" required>
                        </div>

                        <!--<div class="checkbox form-group mb-3">-->
                        <!--    <label>-->
                        <!--        <input id="chkRead" class="class="form-check-input" type="checkbox" name="chkRead" for="chkRead">Berat (centang untuk ubah)</label>-->
                        <!--    <input name="berat" type="text" readonly id="berat" value="1" class="form-control" />-->
                        <!--</div>-->

                        <div class="form-group mb-3">
                            <label class="form-label mb-1">Alamat Saya</label>

                            <button class="button-61 btn-sm mb-1" id="btnAlamat" onclick="getLocation();"
                                role="button"><i class="loading-btn spinner-border spinner-border-sm mr-2 hided"
                                    role="status" aria-hidden="true"></i><span class="btn-txt">Lokasi
                                    Saya</span></button>
                            <input id="alamat" type="text" name="alamat" class="form-control" readonly required>
                            <small id="passwordHelpBlock" class="form-text text-muted hided">Silahkan ubah alamat
                                apabila kurang jelas.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="checkbox form-group mb-2">
                            <label>
                                <input id="addOrder1" type="checkbox" name="addorder" value="ch01" unchecked>Permintaan
                                Pesanan Tambahan
                            </label>
                            <input type="text" name="ch_for[]" placeholder="Contoh: Belanja ke Alfamart"
                                class="form-control ch_for hides">
                        </div>
                </div>
                <div class="row mb-2">

                    <table class="table">
                        <tbody>
                            <div class="container ongkir">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="cli1">Jarak</h4>
                                        <button data-toggle="modal" data-target="#myModal" name="btnRute"
                                            class="button-61 btn-sm hided ml-2" id="btnRute" role="button"
                                            disabled>Lihat Rute</button>
                                    </div>
                                    <div class="col-4">
                                        <!--<h4 class="cla1 " id="jarak1"></h4>-->
                                    </div>
                                </div>
                            </div>
                            <div class="container ongkir">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="cli">Ongkir Pengantaran</h4>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="cla" id="ongkir">
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="container ongkir">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="cli">Pesanan Tambahan</h4>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="cla addOrder">
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="container ongkir1">
                                <div class="row">
                                    <div class="col-8">
                                        <h4 class="cli"> <strong>TOTAL</strong></h4>
                                    </div>
                                    <div class="col-4">
                                        <h4 class="cla font-weight-bold" id="total">

                                        </h4>
                                    </div>
                                </div>
                            </div>


                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary btn-lg " role="button">PESAN SEKARANG</button>
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
                    <button type="button" class=" mt-2 button-close-modal d-flex align-items-end px-2 py-2" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">TUTUP</span></button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
