@extends('layout.app')

@section('content')
<section>
    {{-- <div id="map"></div>
    <div id="msg"></div> --}}
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
        <span><p id="msg"></p></span>
        <div class="row col-md-12 col-lg-offset-3">
            <div class=" col-lg-6 form-margin col-12">
                <div class="row">
                </div>
                <div class=" form-input">
                    <form action="#" class="basic-form" method="post">
                        @csrf
                        <input id="lat" type="hidden" value="">
                        <input id="long" type="hidden" value="">

                        <p class="center" id="adress"></p>
                        <div class="form-group mb-4">
                            <label class="form-label">Nama </label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        <div class="select form-group mb-4">
                            <label class="form-label">Tujuan Pickup</label>
                            <select class="form-control selectpicker" data-live-search="true" required>
                                <option value="">--Silahkan Pilih--</option>
                                @foreach ($mitra as $item)
                                <option data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}" data-subtext="{{Str::limit($item->alamat, 30)}}" value="{{ $item->nama }}" >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4 form-detail">
                            <label class="form-label">Detail Pesanan</label>
                            <input type="text" name="detail" class="form-control" required>
                        </div>

                        <div class="checkbox form-group mb-4">
                            <label>
                                <input id="chkRead" class="mr-2" type="checkbox" name="chkRead" for="chkRead">Berat (centang untuk ubah)</label>
                            <input name="berat" type="text" readonly id="berat" value="1" class="form-control" />
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label mb-1">Alamat Saya</label>
                            <button class="button-61 btn-sm mb-1" id="btnAlamat" onclick="getLocation();"
                                role="button">Lokasi Saya</button>
                            <input id="alamat" type="text" name="alamat" class="form-control" readonly required>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" required>
                        </div>
                        <div class="checkbox form-group mb-4">
                            <label>
                                <input type="checkbox" name="ch_name[]" value="ch01">Permintaan Pesanan Tambahan
                            </label>
                            <input type="text" name="ch_for[]" placeholder="Contoh: Belanja ke Alfamart"
                                class="form-control ch_for hides">
                        </div>
                </div>
                <div class="row mb-5 mt-5">
                    <table class="table">
                        <tbody>
                            <tr class="ongkir">
                                <td class="col-sm-6">
                                    <h4 class="cli">Jarak</h4>
                                </td>
                                <td class="col-sm-6">
                                    <h4 class="cla">
                                        6.6 km (12 Menit) </h4>
                                        <p id="msg"></p>
                                </td>
                            </tr>
                            <tr class="ongkir">
                                <td class="col-sm-6">
                                    <h4 class="cli">Ongkir Pengantaran</h4>
                                </td>
                                <td class="col-sm-6">
                                    <h4 class="cla">
                                        5000 </h4>
                                </td>
                            </tr>
                          
                            <tr class="ongkir">
                                <td class="col-sm-6">
                                    <h4 class="cli">Pesanan Tambahan</h4>
                                </td>
                                <td class="col-sm-6">
                                    <h4 class="cla">
                                        0
                                    </h4>
                                </td>
                            </tr>
                            <tr class="ongkir">
                                <td class="col-sm-6">
                                    <h4 class="cli"> <strong>TOTAL</strong></h4>
                                </td>
                                <td class="col-sm-6">
                                    <h4 class="cla">
                                        <strong>5000</strong>
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="button-18" role="button">Pesan Sekarang</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection
