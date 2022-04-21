@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-4">
                <div class="card">
                    <div class="card-header">
                        Tambah Diskon
                    </div>
                    <div class="card-body">
                        <form action="{{ route('diskon.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Nama Diskon</label>
                                <input name="nama" type="text" class="form-control" value="{{ old('nama') }}"
                                    placeholder="Nama diskon">
                                {{-- @if ($errors->has('nama'))
                            <div class=" text-center" role="alert">
                            <p  class="text-danger">{{ $errors->first('nama') }}</p>
                        </div>
                        @endif --}}
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Persentase Diskon</label>
                                <input name="persentase" type="text" class="form-control" value=""
                                    placeholder="Persentase diskon tanpa %">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Minimal Ongkir</label>
                                <input name="min_ongkir" type="text" class="form-control" value=""
                                    placeholder="Minimal ongkir diskon">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Diskon Berakhir</label>
                                <input name="end_discount" type="date" class="form-control" value="">
                            </div>
                            <div class="text-center">
                                <button type="submit" id="submit" class=" btn-sm btn btn-primary">Simpan
                                    Data</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
