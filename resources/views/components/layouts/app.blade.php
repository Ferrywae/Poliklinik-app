<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard | Poliklinik')</title>

    {{-- Font Awesome 6.4.0 (sesuai tugas) --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-pVI2D3gJjV8bP0l6g6FQ6v3z4U8m0v4l2mKcLr+I9K0vJtH4r+Qm8oP6s8XyT6zq6O9EGV7l+f8Uj0p7vQ7Wdw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- overlayScrollbars (CSS) --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.3/css/OverlayScrollbars.min.css"/>

    {{-- AdminLTE 3.2 (CSS) --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"/>

    @yield('extra_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

    {{-- Navbar --}}
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-link">@yield('page_title', 'Dashboard')</span>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3 d-none d-md-flex align-items-center text-muted">
                <i class="fa-solid fa-user-circle mr-1"></i>
                <small>{{ Auth::user()->nama ?? '-' }} ({{ Auth::user()->role ?? '-' }})</small>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" class="mb-0">
                    @csrf
                    <button class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    {{-- Sidebar --}}
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link text-center">
            <i class="fa-solid fa-hospital-user mr-2"></i>
            <span class="brand-text font-weight-light">Poliklinik</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    {{-- Menu umum --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-gauge"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    {{-- Contoh menu yang bisa kamu kembangkan --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-stethoscope"></i>
                            <p>Poli</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-user-doctor"></i>
                            <p>Dokter</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-users"></i>
                            <p>Pasien</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa-solid fa-calendar-days"></i>
                            <p>Jadwal Periksa</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    {{-- Content Wrapper --}}
    <div class="content-wrapper">
        <section class="content pt-3">
            <div class="container-fluid">
                {{-- Flash message --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    <footer class="main-footer text-sm">
        <strong>Poliklinik</strong> &middot; AdminLTE 3.2 + Font Awesome 6.4.0
        <div class="float-right d-none d-sm-inline-block">
            <b>Role:</b> {{ Auth::user()->role ?? '-' }}
        </div>
    </footer>
</div>

{{-- jQuery (WAJIB sebelum AdminLTE) --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- Bootstrap 4.6 Bundle (JS + Popper) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- overlayScrollbars (JS) --}}
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.3/js/jquery.overlayScrollbars.min.js"></script>

{{-- AdminLTE 3.2 (JS) --}}
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@yield('extra_js')
</body>
</html>
