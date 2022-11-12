@extends('template.sbadmin.layouts.app')

@section('title', 'Edit Angkatan')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Edit Angkatan</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Edit Angkatan</small></li>
            </ol>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Angkatan</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('angkatan/' . $id) }}" class="form" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama_angkatan" class="form-label">Nama Angkatan</label>
                            <input type="text" class="form-control @error('nama_angkatan') is-invalid @enderror"
                                name="nama_angkatan" id="nama_angkatan"
                                value="{{ old('nama_angkatan', $data->nama_angkatan) }}">
                            @error('nama_angkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
