@extends('components.layouts.app')
@section('title','Pasien')
@section('page_title','Dashboard Pasien')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
  <li class="breadcrumb-item active">Dashboard Pasien</li>
@endsection

@section('content')
  <div class="alert alert-success"><i class="fas fa-user mr-1"></i> Panel Pasien</div>
@endsection
