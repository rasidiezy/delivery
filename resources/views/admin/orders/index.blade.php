@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        Data Order
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <br>
                        <table id="example" class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
                            <thead class="bg-table">
                                <tr>
                                    <th>Waktu Order</th>
                                    <th>Nama</th>
                                    <th>Tujuan Mitra</th>
                                    <th>Biaya Tambahan</th>
                                    <th>Ongkir</th>
                                    <th>Total Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @forelse ($orders->sortDesc() as $item)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                        {{-- <td>15/04/2022</td> --}}
                                        <td>{{ $item->nama }}</td>
                                        {{-- <td>{{ Str::limit($item->alamat, 20) }}</td> --}}
                                        <td>{{ $item->Pickup->nama }}</td>
                                        <td>
                                            @if ($item->biaya_rq == 0)
                                                Tidak Ada
                                            @else
                                                {{ @currency($item->biaya_rq) }}
                                            @endif
                                        </td>
                                        <td>
                                            Rp.{{ @currency($item->ongkir) }}
                                        </td>
                                        <td>
                                            Rp. {{ @currency($item->total) }}
                                            @if ($item->potongan_diskon == 0)
                                            @else
                                                <span class=" badge-diskon badge rounded-pill bg-danger">
                                                    -{{ $item->potongan_diskon }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="aksi-display" style="padding-bottom: 21px;">
                                            <a class="btn btn-outline-info btn-sm edit-margin" href="#"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                data-target-id="{{ $item->id }}" data-name="{{ $item->nama }}"
                                                data-alamat="{{ $item->alamat }}" data-detail="{{ $item->detail }}"
                                                data-tujuan="{{ $item->Pickup->nama }}" data-nohp="{{ $item->no_hp }}"
                                                data-rqorder="{{ $item->request_order }}"
                                                data-biayarq="{{ @currency($item->biaya_rq) }}"
                                                data-jarak="{{ $item->jarak }} Km"
                                                data-ongkir="{{ @currency($item->ongkir) }}"
                                                data-diskon="-{{ @currency($item->potongan_diskon) }}"
                                                data-total="{{ @currency($item->total) }}"
                                                data-waktu="{{ date('d M Y H:i:s', strtotime($item->created_at)) }}"><i
                                                    class="fa fa-eye" aria-hidden="true"></i> Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">Tidak Ada Data Order</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table  table-hover">

                        <tbody>
                            <tr>
                                <td>Waktu Order</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <span class="badge rounded-pill bg-light">
                                        <input class="form-control form-control-sm" id="waktu">
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td style="width: 0px;">:</td>
                                <td> <input class="form-control form-control-sm" id="name"></td>
                            </tr>
                            <tr>
                                <td>No HP</td>
                                <td style="width: 0px;">:</td>
                                <td> <input class="form-control form-control-sm" id="nohp"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <textarea class="form-control" id="alamat1" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <textarea class="form-control" id="tujuan" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Detail Pesanan</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <textarea class="form-control" id="detail" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Pesanan Tambahan</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <textarea class="form-control" id="rqorder" rows="2"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Jarak</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <input class="form-control form-control-sm" id="jarak">
                                </td>
                            </tr>
                            <tr>
                                <td>Ongkir</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <input class="form-control form-control-sm" id="ongkir">
                                </td>
                            </tr>
                            <tr class="bg-danger">
                                <td>Potongan Diskon</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <input class="form-control form-control-sm" id="diskon">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 234px;">Biaya Pesanan Tambahan</td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <input class="form-control form-control-sm" id="biayarq">
                                </td>
                            </tr>
                            <tr class="bg-info">
                                <td> <strong>Total</strong> </td>
                                <td style="width: 0px;">:</td>
                                <td>
                                    <input class="form-control form-control-sm fw-bold" id="total">
                                </td>
                            </tr>

                        </tbody>
                    </table>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection
