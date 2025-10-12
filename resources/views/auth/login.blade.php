@extends('components.layouts.guest')
@section('title','Login')
@section('page_title','Masuk')

@section('content')
<form method="POST" action="{{ route('login.post') }}">
  @csrf
  <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>
  </div>
  <div class="input-group mb-3">
    <input type="password" class="form-control" name="password" placeholder="Password" required>
    <div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>
  </div>
  <button class="btn btn-primary btn-block">Login</button>
</form>
<p class="mb-0 mt-3 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
@endsection
