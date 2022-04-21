@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Data Diskon
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex flex-row-reverse mb-4">
                                <a href="{{ route('diskon.create') }}" class="btn btn-primary btn-sm"><span
                                        class="btn-label"><i class="fa fa-plus"></i></span> Tambah Diskon</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <br>
                        <table id="tableMitra" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                            <thead class="bg-table">
                                <tr>
                                    <th>Nama</th>
                                    <th>Persentase</th>
                                    <th>Minimal Ongkir</th>
                                    <th>Berakhir</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($diskon->sortByDesc('end_discount') as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->persentase }}%</td>
                                        <td>{{ @currency($item->min_ongkir) }}</td>
                                        <td>{{ date('d M Y', strtotime($item->end_discount)) }}</td>
                                        <td>
                                            @php($date_facturation = \Carbon\Carbon::parse($item->end_discount))
                                            @if ($date_facturation->isPast())
                                                <span class="badge rounded-pill bg-danger">
                                                    Expired
                                                </span>
                                            @else
                                                <span class=" badge rounded-pill bg-success">
                                                    Berjalan
                                                </span>
                                            @endif
                                        </td>

                                        <td class="aksi-display d-flex justify-content-center"
                                            style="padding-bottom: 21px;">
                                            <a class="btn btn-warning btn-sm edit-margin"
                                                href="{{ route('diskon.edit', $item->id) }}">Edit</a>
                                            <form action="{{ route('diskon.destroy', $item->id) }}" method="post">
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
                                        <td colspan="6">Tidak Ada Data Mitra</td>
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
