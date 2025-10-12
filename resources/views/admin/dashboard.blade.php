@extends('components.layouts.app')
@section('title','Admin')
@section('page_title','Dashboard Admin')
@section('breadcrumbs')
  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
  <li class="breadcrumb-item active">Dashboard Admin</li>
@endsection

@section('content')
  <div class="card card-primary">
    <div class="card-header"><h3 class="card-title"><i class="fas fa-users-cog mr-1"></i> Admin</h3></div>
    <div class="card-body">Selamat datang, {{ auth()->user()->nama ?? 'Admin' }}.</div>
  </div>
@endsection
