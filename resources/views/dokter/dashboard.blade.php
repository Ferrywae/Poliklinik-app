@extends('components.layouts.app')
@section('title', 'Dashboard Dokter')
@section('page_title', 'Dashboard Dokter')

@section('content')
<div class="card shadow-sm">
    <div class="card-body text-center">
        <h2 class="mb-3"><i class="fa-solid fa-user-doctor text-success"></i> Halo Dokter {{ Auth::user()->nama }}</h2>
        <p class="text-muted">Selamat datang di sistem Poliklinik. Di sini Anda bisa melihat jadwal periksa dan data pasien.</p>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fa-solid fa-calendar-days"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jadwal Hari Ini</span>
                        <span class="info-box-number">5 Pasien</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fa-solid fa-notes-medical"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Rekam Medis Baru</span>
                        <span class="info-box-number">3 Data</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
