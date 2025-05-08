@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BekasMarket - Jual Beli Tukar Barang Bekas</title>
  <style>
    /* CSS dimasukkan langsung */
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Arial', sans-serif; line-height: 1.6; }
    .container { width: 90%; margin: auto; }

    .navbar { background: #c5c5c5; color: white; position: sticky; top: 0; width: 100%; z-index: 999; }
    .navbar .container { display: flex; align-items: center; justify-content: space-between; height: 70px; padding: 0 20px; }
    .navbar h1 { font-size: 24px; margin: 0; }
    .navbar nav ul { list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; }
    .navbar nav ul li { display: flex; align-items: center; }
    .navbar nav ul li a { color: white; text-decoration: none; font-weight: bold; font-size: 16px; padding: 0 8px; height: 70px; display: flex; align-items: center; }

    .hero-section { display: flex; justify-content: space-between; align-items: center; background-color: #144f33; color: white; padding: 50px 80px; height: 100vh; flex-wrap: wrap; }
    .hero-content { max-width: 40%; }
    .hero-content h1 { font-size: 28px; margin-bottom: 10px; line-height: 1.4; }
    .hero-content p { font-size: 16px; margin-bottom: 25px; color: #ccc; }
    .play-button { width: 140px; height: auto; }
    .hero-image img { width: 320px; max-width: 100%; border-radius: 30px; background: white; padding: 20px; }

    .layanan { padding: 80px 20px; background: #c5c5c5; text-align: center; }
    .layanan h2 { font-size: 32px; margin-bottom: 50px; }
    .layanan-list { display: flex; gap: 40px; flex-wrap: wrap; justify-content: center; }
    .layanan-item { background: white; border-radius: 12px; padding: 20px; width: 300px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s; }
    .layanan-item:hover { transform: translateY(-10px); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
    .layanan-item img { width: 100%; height: 220px; object-fit: cover; border-radius: 10px; margin-bottom: 15px; }
    .layanan-item h3 { font-size: 24px; margin: 15px 0 10px; }
    .layanan-item p { font-size: 16px; color: #555; }

    .produk { padding: 50px 0; }
    .produk-list { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; margin-top: 30px; }
    .produk-item { width: 250px; border: 1px solid #ccc; padding: 15px; text-align: center; }
    .produk-item img { width: 100%; height: 150px; object-fit: cover; }
    .btn { display: inline-block; background: #27ae60; padding: 10px 15px; margin-top: 10px; color: white; border-radius: 5px; text-decoration: none; }

    .kontak { background: #f9f9f9; padding: 50px 0; text-align: center; }
    .kontak form { max-width: 600px; margin: auto; }
    .kontak input, .kontak textarea { width: 100%; margin-bottom: 20px; padding: 10px; }

    footer { background: #2ecc71; color: white; text-align: center; padding: 15px 0; }
  </style>
</head>
<body>

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

<section id="hero" class="hero-section">
  <div class="hero-content">
    <h1>converted into multi-purpose waste</h1>
    <p>#ubahjadikebaikan</p>
    <a href="#"><img src="img/playstore.jpeg" alt="Google Play" class="play-button"></a>
  </div>
  <div class="hero-image">
    <img src="/img/buangsampah.jpeg" alt="Ilustrasi daur ulang">
  </div>
</section>

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

<section id="produk" class="produk">
  <div class="container">
    <h2>Barang Tersedia</h2>
    <div class="produk-list">
      <div class="produk-item">
        <img src="img/barang1.jpg" alt="Barang 1">
        <h3>Meja Belajar</h3>
        <p>Rp 150.000</p>
        <a href="#" class="btn">Beli Sekarang</a>
      </div>
      <div class="produk-item">
        <img src="img/barang2.jpg" alt="Barang 2">
        <h3>Sepeda Bekas</h3>
        <p>Rp 300.000</p>
        <a href="#" class="btn">Beli Sekarang</a>
      </div>
    </div>
  </div>
</section>

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

<footer>
  <p>&copy; 2025 BekasMarket. Semua Hak Dilindungi.</p>
</footer>

<script src="js/script.js"></script>
</body>
</html>
@endsection
