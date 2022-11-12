@extends('template.sbadmin.layouts.app')

@section('title', 'Add User')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Add User</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Add User</small></li>
            </ol>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
                </div>
                <div class="card-body">
                    <form action="{{ url('user') }}" class="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="jumlah_user" class="form-label">Jumlah User</label>
                            <input type="number" class="form-control @error('jumlah_user') is-invalid @enderror"
                                name="jumlah_user" id="jumlah_user" value="{{ old('jumlah_user') }}">
                            @error('jumlah_user')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="periode_id" class="form-label">Nama Periode</label>
                            <select type="text" class="form-control @error('periode_id') is-invalid @enderror"
                                name="periode_id" id="periode_id" value="{{ old('periode_id') }}">
                                @foreach ($periode as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_periode }}</option>
                                @endforeach
                            </select>
                            @error('periode_id')
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
