@extends('template.sbadmin.layouts.app')

@section('title', 'Dashboard')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Dashboard</small></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @php
                        $cek = \App\Models\Voting::where('user_id', Auth::user()->id)->first();
                    @endphp
                    @if ($cek)
                        <p>Terima Kasih Sudah Menggunakan Hak Pilihmu !</p>
                    @else
                        <p>Gunakan hak pilihmu dengan mengklik tombol dibawah ini !</p>
                        <br>
                        <a href="{{ url('voting') }}" class="btn btn-primary">Klik</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script></script>
@endsection
