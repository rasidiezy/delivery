@extends('layout.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        Data Order
                    </div>
                    <div class="card-body table-responsive">
                        {{-- @include('components.alert') --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Paket</th>
                                    <th>Harga</th>
                                    <th>Waktu Beli</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($checkouts as $item)
                                    <tr>
                                        <td>{{ $item->User->nama }}</td>
                                        <td>{{ $item->Paket->judul }}</td>
                                        <td>{{ @currency($item->total )}}
                                            @if ($item->discount_id)
                                            <span class="badge bg-danger">Diskon {{ $item->diskon_persentase }}%</span>
                                            @endif
                                        </td>
                                        
                                        <td>{{ $item->created_at->format('d M Y') }}
                                        </td>
                                        <td>
                                            @if ($item->payment_status == 'waiting')
                                                 <span class="badge bg-warning text-capitalize">{{ $item->payment_status }}</span>
                                              @else
                                              <span class="badge bg-success text-capitalize">{{ $item->payment_status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="5">Tidak Ada Data Paket</td>
                              </tr>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
