@extends('template.sbadmin.layouts.app')

@section('title', 'Periode Kandidat')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Periode Kandidat</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Periode Kandidat</small></li>
            </ol>
        </div>
    </div>

    <div class="row">
        @foreach ($data as $item)
            <a href="{{ url('kandidat/' . $item->nama_periode) }}" class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $item->nama_periode }}</h6>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('js')
    <script></script>
@endsection
