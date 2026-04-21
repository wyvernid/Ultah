<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Happy Birthday 🎂')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Bubbles animasi background -->
    <div class="ocean-bg">
        @for ($i = 1; $i <= 15; $i++)
            <div class="bubble bubble-{{ $i }}"></div>
        @endfor
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-brand">✨ Happy Birthday</div>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
        </div>
        <div class="nav-toggle" id="navToggle">☰</div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>Made with 💙 · {{ date('Y') }}</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>