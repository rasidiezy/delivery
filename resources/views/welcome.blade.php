@extends('layout.app')

@section('content')
    <section>
        <div class="modal rute fade modal1" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
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
                        <button type="button" class=" mt-2 button-close-modal d-flex align-items-end" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">TUTUP</span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-center" id="modalDiskon" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content animate-bottom">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Voucher Diskon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="text"></div>
                        <div id="alertDiscount" class="alert alert-success hided-alert-discount" role="alert">
                            <p id="alertDiskon"></p>
                        </div>

                        <div class="container-diskon">
                            @foreach ($discount as $diskon)
                                <input type="hidden" id="min_ongkir" value="{{ $diskon->min_ongkir }}">
                                <div class="col-12 diskon-data mb-2" data-percentage="{{ $diskon->persentase }}"
                                    data-id="{{ $diskon->id }}" data-name="{{ $diskon->nama }}"
                                    data-minongkir="{{ $diskon->min_ongkir }}">
                                    <div class="row diskon-row">
                                        <div class="col-4 disc-persen d-flex align-items-center">
                                            {{ $diskon->persentase }}%
                                        </div>
                                        <div class="col-6 disc-text">
                                            <h4 class="name-disc"> <strong>{{ $diskon->nama }}</strong></h4>
                                            <p class="min-ongkir">Minimal ongkir
                                                {{ @currency($diskon->min_ongkir) }}
                                            </p>
                                            <p class="min-ongkir text-success">Berakhir :
                                                {{ \Carbon\Carbon::parse($diskon->end_discount)->format('d-m-Y') }}</p>
                                        </div>
                                        <div class="col-2 d-flex align-items-center">
                                            <img src="{{ asset('images/tick.png') }}" class="icon-selected-discount hided"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary-discount btn-lg btn-block" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">OK</button>
                        {{-- <button type="button" class=" mt-2 custom-close d-flex align-items-end" data-dismiss="modal"
                    aria-label="Close"><span aria-hidden="true">TUTUP</span></button> --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="jumbotron jumbotron-fluid text-center ">
            <div class="container ">
                <h1 class="display-4">Buntok Delivery</h1>
            </div>
        </div>
        <div class="container1">
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
                                <input id="lat" name="latitude" type="hidden" value="{{ old('latitude') }}">
                                <input id="long" name="longitude" type="hidden" value="{{ old('longitude') }}">
                                <input id="idDiskon" type="hidden" name="id_diskon" value="{{ old('id_diskon') }}">

                                <label class="form-label">Nama </label>
                                <input type="text" name="nama"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                    value="{{ old('nama') }}">
                                @if ($errors->has('nama'))
                                    <div class=" text-center" role="alert">
                                        <p class="text-danger">{{ $errors->first('nama') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class=" form-group mb-3">
                                <label class="form-label">Tujuan Pickup</label>
                                <select id="tujuanPickup" name="pickup_id" class="form-control selectpicker"
                                    data-live-search="true" value="{{ old('pickup_id') }}">
                                    <option value="">--Silahkan Pilih--</option>
                                    @foreach ($mitra as $item)
                                        <option data-lat="{{ $item->latitude }}" data-lng="{{ $item->longitude }}"
                                            data-subtext="{{ $item->alamat }}" value="{{ $item->id }}"
                                            {{ old('pickup_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('pickup_id'))
                                    <div class=" text-center" role="alert">
                                        <p class="text-danger">{{ $errors->first('pickup_id') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Detail Pesanan</label>
                                <input type="text" name="detail"
                                    class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}"
                                    value="{{ old('detail') }}">
                                @if ($errors->has('detail'))
                                    <div class=" text-center" role="alert">
                                        <p class="text-danger">{{ $errors->first('detail') }}</p>
                                    </div>
                                @endif
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

                                <!--<button data-toggle="modal" data-target="#myModal"-->
                                <!--                class="button-61 btn-sm hided ml-2" id="btnRute" role="document"-->
                                <!--                disabled>Lihat Rute</button>-->
                                <input id="alamat" type="text" name="alamat"
                                    class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                                    value="{{ old('alamat') }}" readonly>
                                @if ($errors->has('alamat'))
                                    <div class=" text-center" role="alert">
                                        <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                    </div>
                                @endif
                                <small id="passwordHelpBlock" class="form-text text-muted hided">Silahkan ubah alamat
                                    apabila kurang jelas.</small>
                            </div>


                            <div class="form-group mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="no_hp"
                                    class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}"
                                    value="{{ old('no_hp') }}">
                                @if ($errors->has('no_hp'))
                                    <div class=" text-center" role="alert">
                                        <p class="text-danger">{{ $errors->first('no_hp') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="checkbox form-group mb-2">
                                <label>
                                    <input id="addOrder1" type="checkbox" name="ch01"
                                        @if (old('ch01')) checked @endif>Permintaan
                                    Pesanan Tambahan
                                </label>
                                <input type="text" id="reqOrder" name="request_order"
                                    placeholder="Contoh: Belanja ke Alfamart" class="form-control ch_for hides"
                                    value="{{ old('request_order') }}">
                            </div>


                    </div>
                    <div class="row mb-2">
                        <div id="my-div" class="mb-3 mt-3">
                            <a href="#" id="voucher" data-target="#modalDiskon" class="fill-div">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <img src="{{ asset('coupon.png') }}" class="icon-vcr mr-1" alt="">
                                        Voucher Diskon
                                    </div>
                                    <div class="col-6">
                                        <input id="diskon" name="diskon" type="text" value="Gunakan kode >">
                                    </div>
                                </div>
                            </a>
                        </div>

                        <table class="table">
                            <tbody>
                                <div class="box-sd">

                                    <div class="container ongkir">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="cli1">Jarak</h4>
                                                <a data-toggle="modal" data-target="#myModal"
                                                    class="button-rute btn-sm hided ml-2 disabled" id="btnRute"
                                                    role="document" disabled>Lihat Rute</a>
                                            </div>

                                            <div class="col-4">
                                                <input id="jarak1" name="jarak" type="text" value="{{ old('jarak') }}"
                                                    style="text-align:right;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container ongkir">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="cli">Ongkir Pengantaran</h4>
                                            </div>
                                            <div class="col-4">
                                                <input id="ongkir" name="ongkir" type="text" value="{{ old('ongkir') }}"
                                                    style="text-align:right;">

                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container ongkir">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="cli">Pesanan Tambahan</h4>
                                            </div>
                                            <div class="col-4">
                                                <input id="biayarq" name="biaya_rq" type="text"
                                                    value="{{ old('biaya_rq') }}" style="text-align:right;">
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container ongkir hided" id="discount">
                                        <div class="row text-danger">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="cli">Potongan Diskon</h4>
                                            </div>
                                            <div class="col-4">
                                                <input id="potonganDiskon" name="diskon" type="text"
                                                    value="{{ old('potonganDiskon') }}" style="text-align:right;">
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container ongkir">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <h4 class="cli"> <strong>TOTAL</strong></h4>
                                            </div>
                                            <div class="col-4">
                                                <input id="total" name="total" type="text" value="{{ old('total') }}"
                                                    style="text-align:right;">
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mb-5">
                        <!--<button type="submit" class="btn btn-primary btn-lg" id="btnSubmit" name="submit" role="button"><i class="loading-btna spinner-border spinner-border-sm mr-2 hided"></i>PESAN-->
                        <!--    SEKARANG-->
                        <!--</button>-->
                        <button type="submit" class="btn btn-primary1 btn-lg" id="btnSubmit" name="submit" role="button"><i
                                class="loading-btna spinner-border spinner-border-sm mr-2 hided"></i><span
                                class="btn-txt1">PESAN
                                SEKARANG</span></button>
                        <!--<button id="submit" class="submit" type="button" >Submit</button>-->
                    </div>
                    </form>
                </div>
            </div>
        </div>




    </section>
@endsection
