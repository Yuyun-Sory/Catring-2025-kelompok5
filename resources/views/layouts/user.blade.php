<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Catering Teras' }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    {{-- NAVBAR UTAMA (muncul jika tidak disembunyikan) --}}
    @if (!isset($hideNavbar))
        @include('layouts.navbar-user')
    @endif

    {{-- NAVBAR BACK KHUSUS HALAMAN DETAIL --}}
    @if (isset($backNavbar))
        <nav style="background: #37a000; padding: 12px;">
            <div class="container">
                <a href="{{ url()->previous() }}" style="color:white; font-weight:bold; text-decoration:none;">
                    ← Kembali
                </a>
            </div>
        </nav>
    @endif

    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
