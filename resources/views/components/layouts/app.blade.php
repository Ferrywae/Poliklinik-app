<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title','Dashboard') • Poliklinik</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlaysscrollbars/1.13.3/css/OverlayScrollbars.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('components.partials.header')
  @include('components.partials.sidebar')

  <div class="content-wrapper">
    {{-- Header + Breadcrumb default --}}
    <section class="content-header">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <h1 class="m-0">@yield('page_title','Dashboard')</h1>
        <ol class="breadcrumb float-sm-right mb-0">
          @hasSection('breadcrumbs')
            @yield('breadcrumbs')
          @else
            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
            <li class="breadcrumb-item active">@yield('page_title','Dashboard')</li>
          @endif
        </ol>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        @include('components.partials.alerts')
        @yield('content')
      </div>
    </section>
  </div>

  @include('components.partials.footer')
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlaysscrollbars/1.13.3/js/jquery.overlayScrollbars.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>
