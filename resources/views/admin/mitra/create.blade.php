@extends('layout.admin.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 mt-4">
            <div class="card">
                <div class="card-header">
                    <strong> Tambah Mitra</strong>
                </div>
                <div class="card-body">
                    <h5 class="mb-2 text-center">Tentukan Lokasi Mitra</h5>
                    <div id="map"></div>
                    <div class="d-flex justify-content-center">
                        <p><span id="onIdlePositionView"></span></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary btn-sm mb-2" id="confirmPosition">Kunci Posisi</button>
                    </div>
                    <div class="d-flex justify-content-center">
                            <span class="badge bg-primary" id="onClickPositionView">
                                </span>
                        <p>
                    </div>
                        <span id="Latitude"></span>
                    </p>
                    <p>
                        <span id="Longitude"></span>
                    </p>
                    <form action="{{ route('mitra.store') }}" method="post">
                        @csrf
                        <input id="latitude" name="latitude" type="hidden" class="form-control" value="" readonly>              
                    <input id="longitude" name="longitude" type="hidden" class="form-control" value="" readonly>
                    
                        <div class="form-group mb-4">
                            <label for="" class="form-label">Nama Mitra</label>
                            <input name="nama" type="text" class="form-control" value="{{ old('nama') }}">
                            {{-- @if ($errors->has('nama'))
                            <div class=" text-center" role="alert">
                            <p  class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        @endif --}}
                </div>          
                <div class="form-group mb-4">
                    <label for="" class="form-label">Alamat</label>
                    <input name="alamat" id="alamat" type="text" class="form-control" value="">
                    <div id="passwordHelpBlock" class="form-text">
                        Note: Silahkan ubah alamat jika alamat kurang jelas
                      </div>
                </div>
                <div class="text-center">
                    <button type="submit" class=" btn-sm btn btn-primary">Simpan Data</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
