@extends('components.layouts.guest')

@section('title','Login')
@section('page_title','Login ke Sistem')

@section('content')
<form method="POST" action="{{ route('login.post') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button class="btn btn-primary w-100">Login</button>
</form>
<p class="mt-3 text-center text-white">
    Belum punya akun? <a class="text-warning" href="{{ route('register') }}">Daftar</a>
</p>
@endsection
