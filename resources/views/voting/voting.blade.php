@extends('template.sbadmin.layouts.app')

@section('title', 'Voting')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1 class="h3 mb-4 text-gray-800">Voting</h1>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right" style="background-color: none;">
                <li class="breadcrumb-item active"><small>Voting</small></li>
            </ol>
        </div>
    </div>

    <div class="row">
        @foreach ($kandidat as $item)
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $item->urut }}</h6>
                    </div>
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name={{ $item->nama_kandidat }}" alt=""
                            style="min-width:50%;">
                        <h5 class="mt-2"><b>{{ $item->nama_kandidat }}</b></h5>
                        <form action="{{ url('voting') }}" method="post">
                            @csrf
                            <input type="hidden" name="kandidat_id" value="{{ $item->id }}">
                            <button class="btn btn-primary btn-block">Vote</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script></script>
@endsection
