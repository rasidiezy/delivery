@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Data Mitra
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row-reverse mb-4">
                                <a href="{{ route('mitra.create') }}" class="btn btn-primary btn-sm">Tambah Mitra</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="
                                                                      width: 20%;
                                                                  ">Nama</th>
                                    <th style="
                                                                      width: 50%;
                                                                  ">Alamat</th>
                                    <th>Titik Kordinat</th>
                                    {{-- <th>Longitude</th> --}}
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($mitra as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <span class="badge bg-primary">
                                                {{ $item->latitude }}, {{ $item->longitude }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ route('mitra.edit', $item->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('mitra.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                    data-name="{{ $item->nama }}" data-toggle="tooltip"
                                                    title='Delete'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="6">Tidak Ada Data Diskon</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
