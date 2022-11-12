@extends('template.sbadmin.layouts.app')

@section('title', 'Kandidat tahun ' . $periode->nama_periode)

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Kandidat tahun {{ $periode->nama_periode }}</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Kandidat tahun {{ $periode->nama_periode }}</small></li>
            </ol>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('kandidat/' . $periode->nama_periode . '/add') }}" class="btn btn-primary">
                        <h6 class="m-0 font-weight-bold text-white">Add Data</h6>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Urut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kandidat as $key => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="https://ui-avatars.com/api/?name={{ $item->nama_kandidat }}"
                                                alt="">
                                        </td>
                                        <td>{{ $item->nama_kandidat }}</td>
                                        <td>{{ $item->urut }}</td>
                                        <td>
                                            <a href="{{ url('kandidat/edit/' . $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ url('kandidat/' . $item->id) }}" class="form d-inline"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
@endsection

@section('js')
    <script type="module">
        $('#dataTable').DataTable();
    </script>
@endsection
