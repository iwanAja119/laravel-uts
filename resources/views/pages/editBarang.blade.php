@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Barang'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="mb-0">Form Edit Barang</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga_barang" class="form-label">Harga Barang</label>
                                <input type="text" class="form-control" id="harga_barang" name="harga_barang" value="{{ $barang->harga_barang }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi_barang" class="form-label">Deskripsi Barang</label>
                                <textarea class="form-control" id="deskripsi_barang" name="deskripsi_barang" rows="3">{{ $barang->deskripsi_barang }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="satuan_barang_id" class="form-label">Satuan Barang</label>
                                <select class="form-control" id="satuan_barang_id" name="satuan_barang_id">
                                    @foreach($satuans as $satuan)
                                        <option value="{{ $satuan->id }}" {{ $satuan->id == $barang->satuan_barang_id ? 'selected' : '' }}>{{ $satuan->nama_satuan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
