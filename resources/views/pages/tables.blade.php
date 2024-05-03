@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Barang Table</h6>
                            <a href="{{ route('tambahBarang') }}" class="btn btn-primary btn-sm float-end">Tambah Barang</a>
                        </div>
                    </div>
                    
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Deskripsi</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Satuan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->harga_barang }}</td>
                                        <td>{{ $item->deskripsi_barang }}</td>
                                        <td>{{ $item->nama_satuan }}</td>
                                        <td>
                                            <a href="{{ route('editBarang', $item->id) }}" class="btn btn-success text-white font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit barang">
                                                Edit
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
