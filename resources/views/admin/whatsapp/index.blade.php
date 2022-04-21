@extends('layout.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        No Whatsapp
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <h4 class="text-center">Nomor Whatsapp Admin CS</h4>

                        <h1 class="text-center mt-3 mb-3"> {{ $nowa->no_hp }}</h1>
                        <div class="text-center">
                            <button data-bs-toggle="modal" data-bs-target="#modalWhatsapp" type="button"
                                class="btn btn-warning"><i class="fa fa-edit"></i></span> Ubah Nomor Whatsapp</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="modalWhatsapp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Nomor Whatsapp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('whatsapp.update', 1) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label label-text-modal">Masukkan No Whatsapp
                                Baru</label>
                            <input type="text" class="form-control label-text-modal" name="no_hp" required>
                        </div>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
