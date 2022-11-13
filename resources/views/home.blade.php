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
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total User Periode {{ $periode->nama_periode }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Voting Periode {{ $periode->nama_periode }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="userVoting">{{ $voting }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Belum Voting Periode {{ $periode->nama_periode }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="belumVoting">{{ $user - $voting }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Vote Kandidat</h6>
                </div>
                <div class="card-body">
                    @foreach ($kandidat as $item)
                        @php
                            $suara = \App\Models\Voting::where('kandidat_id', $item->id)->count();
                            $persen = ($suara / $user) * 100;
                        @endphp
                        <h4 class="small font-weight-bold">{{ $item->nama_kandidat }} <span class="float-right"
                                id="suara{{ $item->id }}">{{ $suara }}</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" role="progressbar" id="persen{{ $item->id }}"
                                style="width: {{ $persen }}%" aria-valuenow="{{ $suara }}" aria-valuemin="0"
                                aria-valuemax="{{ $user }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        document.addEventListener("DOMContentLoaded", function(event) {
            Echo.channel('e-dashboard')
                .listen('Edata', (e) => {
                    $('#userVoting').html(e.data.userVoting);
                    $('#belumVoting').html(e.data.belumVoting);
                    $.each(e.data.hasil,function(i,item){
                        $("#suara" + item.id).html(item.suara);
                        $("#persen" + item.id).css("width", item.persen);
                    });
                })
        });
    </script>
@endsection
