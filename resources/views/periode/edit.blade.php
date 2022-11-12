@extends('template.sbadmin.layouts.app')

@section('title', 'Edit Periode')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Edit Periode</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Edit Periode</small></li>
            </ol>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Periode</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('periode/' . $id) }}" class="form" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="nama_periode" class="form-label">Nama Periode</label>
                            <input type="text" class="form-control @error('nama_periode') is-invalid @enderror"
                                name="nama_periode" id="nama_periode"
                                value="{{ old('nama_periode', $data->nama_periode) }}">
                            @error('nama_periode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">Status</label>
                            <select type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                                id="status" value="{{ old('status', $data->status) }}">
                                <option value="active" @if ($data->status == 'active') selected @endif>Active</option>
                                <option value="nonactive" @if ($data->status == 'nonactive') selected @endif>Nonactive
                                </option>
                            </select>
                            @error('status')
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
