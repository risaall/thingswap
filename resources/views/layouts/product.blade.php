<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EcondMart - Products')</title>

    {{-- CSS lama --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">

    {{-- Tambahan Tailwind CDN untuk bantu styling konten --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @stack('styles')
</head>
<body>

    {{-- Header (tetap) --}}
    <header class="header">
        <div class="container">
            <div class="logo">
                <h1><a href="{{ route('home') }}">EcondMart</a></h1>
            </div>
            <nav class="nav">
                <ul class="nav-list">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('user.products.index') }}" class="{{ request()->routeIs('user.products.*') ? 'active' : '' }}">Products</a></li>
                    <li><a href="{{ route('contribute') }}" class="{{ request()->routeIs('contribute') ? 'active' : '' }}">Contribute</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
                    @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                                @csrf
                                <button type="submit" class="logout-button">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>

    {{-- Konten Dinamis dengan Tailwind container --}}
    <main class="max-w-7xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    {{-- Footer (tetap) --}}
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>EcondMart</h3>
                    <p>Platform Jual Beli Barang Bekas Terpercaya dan Berkualitas</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('user.products.index') }}">Products</a></li>
                        <li><a href="{{ route('contribute') }}">Contribute</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#">Cara Kerja</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Kontak</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> +62 819-0227-5000</li>
                        <li><i class="fas fa-envelope"></i> info@EcondMart.com</li>
                        <li><i class="fas fa-map-marker-alt"></i> Surabaya, Indonesia</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    {{-- JS --}}
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
