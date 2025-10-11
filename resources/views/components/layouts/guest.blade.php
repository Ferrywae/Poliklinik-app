<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Auth | Poliklinik')</title>

    {{-- Font Awesome 6.4.0 --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    {{-- Bootstrap 5 untuk halaman guest (lebih enak styling form) --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
            overflow: hidden;
        }
        .auth-card .header {
            background: #0d6efd;
            color: #fff;
            padding: 18px 22px;
            text-align: center;
        }
    </style>
    @yield('extra_css')
</head>
<body>

<div class="card auth-card">
    <div class="header">
        <h5 class="mb-0"><i class="fa-solid fa-hospital mr-1"></i> Poliklinik</h5>
        <small>@yield('page_title','Masuk')</small>
    </div>
    <div class="card-body">
        {{-- Flash & errors --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('extra_js')
</body>
</html>
