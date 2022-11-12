@extends('template.sbadmin.layouts.app')

@section('title','Example Page')

@section('css')
    <style>
        
    </style>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-6">
      <h1 class="h3 mb-4 text-gray-800">Example Page</h1>
    </div>
    <div class="col-md-6">
      <ol class="breadcrumb float-sm-right" style="background-color: none;">
          <li class="breadcrumb-item"><small><a href="{{ url('home') }}" style="text-decoration:none;">Example Page</a></small></li>
          <li class="breadcrumb-item active"><small>Event</small></li>
      </ol>
    </div>
  </div>

  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header">
          Example
        </div>
        <div class="card-body">
          hello world!
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>

    </script>
@endsection