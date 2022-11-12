@extends('template.sbadmin.layouts.app')

@section('title','Periode')

@section('css')
    <style>

    </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h1 class="h3 mb-4 text-gray-800">Periode</h1>
    </div>
    <div class="col-md-6">
      <ol class="breadcrumb float-sm-right" style="background-color: none;">
          <li class="breadcrumb-item active"><small>Periode</small></li>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header">
          Periode
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>

    </script>
@endsection
