@extends('components.layouts.guest')
@section('title','Register')
@section('page_title','Daftar Akun')

@section('content')
<form method="POST" action="{{ route('register.post') }}">
  @csrf
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>
  </div>
  <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
  </div>
  <button class="btn btn-success btn-block">Daftar</button>
</form>
<p class="mb-0 mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
@endsection
