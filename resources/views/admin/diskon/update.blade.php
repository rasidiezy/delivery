@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-4">
                <div class="card">
                    <div class="card-header">
                        Update Diskon : {{ $diskon->nama }}
                    </div>
                    <div class="card-body">

                        <form action="{{ route('diskon.update', $diskon->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $diskon->id }}">
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Nama Diskon</label>
                                <input name="nama" type="text" class="form-control"
                                    value="{{ old('nama') ?: $diskon->nama }}" placeholder="Nama diskon">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Persentase Diskon</label>
                                <input name="persentase" type="text" class="form-control"
                                    value="{{ old('persentase') ?: $diskon->persentase }}"
                                    placeholder="Persentase diskon tanpa %">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Minimal Ongkir</label>
                                <input name="min_ongkir" type="text" class="form-control"
                                    value="{{ old('min_ongkir') ?: $diskon->min_ongkir }}"
                                    placeholder="Minimal ongkir diskon">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Diskon Berakhir</label>
                                <input name="end_discount" type="date" class="form-control"
                                    value="{{ old('end_discount') ?: $diskon->end_discount }}">
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
