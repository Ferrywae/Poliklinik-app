@extends('components.layouts.app')
@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard Admin')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h2 class="mb-3"><i class="fa-solid fa-crown text-warning"></i> Selamat Datang, {{ Auth::user()->nama }}</h2>
        <p class="text-muted">Anda login sebagai <b>Admin</b>. Gunakan panel ini untuk mengelola data Poliklinik.</p>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fa-solid fa-stethoscope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Data Poli</span>
                        <span class="info-box-number">12</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fa-solid fa-user-doctor"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Dokter Terdaftar</span>
                        <span class="info-box-number">8</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fa-solid fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Pasien</span>
                        <span class="info-box-number">34</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
