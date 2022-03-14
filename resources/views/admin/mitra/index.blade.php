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
                                    <a href="#" class="btn btn-primary btn-sm">Tambah Mitra</a>
                              </div>
                        </div>
                      {{-- @include('components.alert') --}}
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>Nama</th>
                                  <th>Kode Voucher</th>
                                  <th>Deskripsi</th>
                                  <th>Persentase Diskon</th>
                                  <th colspan="2">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              
                              {{-- @forelse ($discount as $item)
                                  <tr>
                                      <td>{{ $item->nama }}</td>
                                      <td>
                                          <span class="badge bg-primary">
                                              {{ $item->kode_voucher }}
                                          </span>
                                      </td>
                                      <td>{{ $item->deskripsi }}</td>
                                      <td>{{ $item->persentasi }}%</td>
                                     <td>
                                         <a class="btn btn-warning btn-sm" href="{{ route('admin.discount.edit', $item->id) }}">Edit</a>
                                     </td>
                                     <td>
                                        <form action="{{ route('admin.discount.destroy', $item->id) }}" method="post" onsubmit="return confirm('Hapus data diskon?')">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm">Hapus</button>
                                      </form>
                                     </td>
                                  </tr>
                              @empty
                              <tr class="text-center">
                                  <td colspan="6">Tidak Ada Data Diskon</td>
                            </tr>
                              @endforelse
                          </tbody> --}}
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection