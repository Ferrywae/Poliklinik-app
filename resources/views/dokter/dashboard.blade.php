@extends('components.layouts.app')
@section('title','Dokter')
@section('page_title','Dashboard Dokter')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
  <li class="breadcrumb-item active">Dashboard Dokter</li>
@endsection

@section('content')
  <div class="alert alert-info"><i class="fas fa-stethoscope mr-1"></i> Panel Dokter</div>
@endsection
