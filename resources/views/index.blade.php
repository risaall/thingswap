@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BekasMarket - Jual Beli Tukar Barang Bekas</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<header class="navbar">
  <div class="container">
    <h1>BekasMarket</h1>
    <nav>
      <ul>
        <li><a href="#hero">Beranda</a></li>
        <li><a href="#layanan">Layanan</a></li>
        <li><a href="#produk">Produk</a></li>
        <li><a href="#kontak">Kontak</a></li>
      </ul>
    </nav>
  </div>
</header>

<!-- Hero Section Mirip Gambar -->
<section id="hero" class="hero-section">
  <div class="hero-content">
    <h1>converted into multi-purpose waste</h1>
    <p>#ubahjadikebaikan</p>
    <a href="#"><img src="img/google-play.png" alt="Google Play" class="play-button"></a>
  </div>
  <div class="hero-image">
    <img src="img/hero-illustration.png" alt="Ilustrasi daur ulang">
  </div>
</section>

<!-- Layanan Section -->
<section id="layanan" class="layanan">
  <div class="container">
    <h2>Layanan Kami</h2>
    <div class="layanan-list">
      <div class="layanan-item">
        <img src="img/jualbarang.jpeg" alt="Jual Barang">
        <h3>Jual Barang</h3>
        <p>Jual barang bekas Anda dengan mudah.</p>
      </div>
      <div class="layanan-item">
        <img src="img/tukarbarang.jpeg" alt="Tukar Barang">
        <h3>Tukar Barang</h3>
        <p>Tukar barang layak pakai dengan pengguna lain.</p>
      </div>
      <div class="layanan-item">
        <img src="img/belibarang.jpeg" alt="Beli Barang">
        <h3>Beli Barang</h3>
        <p>Beli barang berkualitas dari admin.</p>
      </div>
    </div>
  </div>
</section>

<!-- Produk Section -->
<section id="produk" class="produk">
  <div class="container">
    <h2>Barang Tersedia</h2>
    <div class="produk-list">
      @foreach ($products as $product)
        <div class="produk-item">
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
          <h3>{{ $product->name }}</h3>
          <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
          <a href="#" class="btn">Beli Sekarang</a>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Kontak Section -->
<section id="kontak" class="kontak">
  <div class="container">
    <h2>Hubungi Kami</h2>
    <form action="#">
      <input type="text" placeholder="Nama" required>
      <input type="email" placeholder="Email" required>
      <textarea placeholder="Pesan" required></textarea>
      <button type="submit" class="btn">Kirim</button>
    </form>
  </div>
</section>

<!-- Footer -->
<footer>
  <p>&copy; 2025 BekasMarket. Semua Hak Dilindungi.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>
