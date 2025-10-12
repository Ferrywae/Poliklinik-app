@php
  function is_active($pattern){ return request()->routeIs($pattern) ? 'active' : ''; }
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('welcome') }}" class="brand-link">
    <span class="brand-text font-weight-light">PoliklinikApp</span>
  </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">
          {{ auth()->user()->nama ?? 'User' }}
          @if(auth()->check()) <span class="badge badge-info">{{ auth()->user()->role }}</span> @endif
        </a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
        @if(auth()->check() && auth()->user()->role === 'admin')
          <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ is_active('admin.dashboard') }}"><i class="nav-icon fas fa-gauge"></i><p>Dashboard Admin</p></a></li>
        @endif
        @if(auth()->check() && auth()->user()->role === 'dokter')
          <li class="nav-item"><a href="{{ route('dokter.dashboard') }}" class="nav-link {{ is_active('dokter.dashboard') }}"><i class="nav-icon fas fa-stethoscope"></i><p>Dashboard Dokter</p></a></li>
        @endif
        @if(auth()->check() && auth()->user()->role === 'pasien')
          <li class="nav-item"><a href="{{ route('pasien.dashboard') }}" class="nav-link {{ is_active('pasien.dashboard') }}"><i class="nav-icon fas fa-user"></i><p>Dashboard Pasien</p></a></li>
        @endif
      </ul>
    </nav>
  </div>
</aside>
