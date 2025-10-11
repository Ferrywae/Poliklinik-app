@extends('components.layouts.app')
@section('title', 'Dashboard Pasien')
@section('page_title', 'Dashboard Pasien')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h2 class="mb-3"><i class="fa-solid fa-user text-primary"></i> Halo, {{ Auth::user()->nama }}</h2>
        <p class="text-muted">Selamat datang di sistem Poliklinik. Di sini Anda bisa melihat jadwal periksa dan riwayat berobat Anda.</p>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fa-solid fa-calendar-check"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jadwal Periksa Aktif</span>
                        <span class="info-box-number">1 Jadwal</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fa-solid fa-heart-pulse"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Riwayat Periksa</span>
                        <span class="info-box-number">6 Kali</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
