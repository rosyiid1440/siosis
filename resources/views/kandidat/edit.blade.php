@extends('template.sbadmin.layouts.app')

@section('title', 'Edit Kandidat Tahun ' . $periode->nama_periode)

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Edit Kandidat Tahun {{ $periode->nama_periode }}</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Edit Kandidat Tahun {{ $periode->nama_periode }}</small></li>
            </ol>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kandidat Tahun {{ $periode->nama_periode }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('kandidat/' . $data->id) }}" class="form" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama_kandidat" class="form-label">Nama Kandidat</label>
                            <input type="text" class="form-control @error('nama_kandidat') is-invalid @enderror"
                                name="nama_kandidat" id="nama_kandidat"
                                value="{{ old('nama_kandidat', $data->nama_kandidat) }}">
                            @error('nama_kandidat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="urut" class="form-label">Nomor Urut</label>
                            <input type="number" class="form-control @error('urut') is-invalid @enderror" name="urut"
                                id="urut" value="{{ old('urut', $data->urut) }}">
                            @error('urut')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="visi_misi" class="form-label">Visi Misi</label>
                            <textArea type="text" class="form-control @error('visi_misi') is-invalid @enderror" name="visi_misi" id="visi_misi"
                                value="{{ old('visi_misi') }}">{{ $data->visi_misi }}</textArea>
                            @error('visi_misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="periode_id" value="{{ $periode->id }}">
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
