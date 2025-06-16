<!-- HALAMAN UTAMA / INDEX -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcondMart - Second Life, Smart Buy!</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
      <div class="container">
          <div class="logo">
              <h1><a href="{{ route('home') }}">EcondMart</a></h1>
          </div>
          <nav class="nav">
    <ul class="nav-list">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="{{ route('about') }}" >About Us</a></li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('contribute') }}">Contribute</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Where Preloved <br> Finds New Love</h2>
                    <p>#EcondMartForEveryone</p>
                </div>
                <div class="hero-image">
                    <img src="img/hero.jpeg" alt="Recycling bin with waste materials">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
<section class="mission">
    <div class="container">
        <div class="mission-content">
            <div class="mission-image">
                <div class="recycle-bin">
                    <h3>We're Creating a Future<br>Where Everything Has a Second Chance</h3>
                    <p>#EcondMartForEveryone</p>
                    <div class="recycle-logo">
                        <i class="fas fa-recycle"></i>
                        <span>WE CARE & RECYCLE</span>
                    </div>
                </div>
            </div>
            <div class="mission-text">
                <h3>Misi Kami: Dari Barang Tak Terpakai Menjadi Harapan Baru</h3>
                <p>Kami berkomitmen untuk memberikan kehidupan kedua bagi barang-barang bekas yang masih layak pakai dengan menyalurkannya kepada mereka yang membutuhkan. Setiap produk yang tak lagi digunakan, bisa menjadi solusi nyata bagi orang lain.</p>
                
                <p>Untuk barang yang sudah tidak layak pakai, kami membantu mendaur ulangnya melalui jaringan mitra dan fasilitas daur ulang terpercaya. Daripada menjadi sampah, barang-barang tersebut kami ubah menjadi nilai baru demi keberlanjutan lingkungan.</p>

                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number">203</span>
                        <span class="stat-label">Barang Telah Didaur Ulang</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">24</span>
                        <span class="stat-label">Gudang & Mitra Penyaluran</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">589</span>
                        <span class="stat-label">Barang Layak Disalurkan</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">89</span>
                        <span class="stat-label">Pengguna Bergabung</span>
                    </div>
                </div>

                <a href="#" class="learn-more">Pelajari Selengkapnya Tentang Misi Kami ></a>
            </div>
        </div>
    </div>
</section>


    <!-- Services Section -->
<section class="services" id="layanan">
    <div class="container">
        <h2>Layanan Kami</h2>
        <p>Solusi berkelanjutan dari EcondMart untuk memberi hidup kedua bagi barang bekas Anda.</p>
        
        <div class="services-grid">

            <!-- Beli Barang -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Beli Barang</h3>
                <p>Dapatkan barang bekas berkualitas tinggi dengan harga terjangkau. Temukan kebutuhanmu sambil tetap peduli lingkungan.</p>
            </div>

            <!-- Jual Barang -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-cube"></i>
                </div>
                <h3>Jual Barang</h3>
                <p>Jual barang bekas berkualitasmu secara mudah dan cepat melalui EcondMart, dan bantu orang lain mendapatkan apa yang mereka cari.</p>
            </div>

            <!-- Donasi Barang -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Donasi Barang</h3>
                <p>Sumbangkan barang yang tak lagi kamu pakai tapi masih layak guna. Kami akan menyalurkannya kepada yang membutuhkan.</p>
            </div>

            <!-- Daur Ulang Barang -->
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-recycle"></i>
                </div>
                <h3>Daur Ulang</h3>
                <p>Barang rusak dan tidak layak pakai? Kami bantu proses daur ulangnya agar tidak menjadi limbah yang mencemari lingkungan.</p>
            </div>

        </div>
    </div>
</section>


    <!-- Products Section -->
<section class="products" id="produk">
  <div class="container">
    <h2>Produk Kami</h2>
    <p>Pilih kategori untuk melihat barang bekas yang tersedia atau hasil daur ulang kami.</p>

    <div class="product-tabs">
      <button class="tab-button active" onclick="showTab('jual')">Barang Dijual</button>
      <button class="tab-button" onclick="showTab('daur')">Hasil Daur Ulang</button>
    </div>

    <div id="jual" class="tab-content active">
      <div class="products-grid">
        <div class="product-item"><i class="fas fa-chair"></i><span>Kursi</span></div>
        <div class="product-item"><i class="fas fa-table"></i><span>Meja</span></div>
        <div class="product-item"><i class="fas fa-shopping-bag"></i><span>Tas</span></div>
        <div class="product-item"><i class="fas fa-tshirt"></i><span>Baju</span></div>
      </div>
    </div>

    <div id="daur" class="tab-content">
      <div class="products-grid">
        <div class="product-item"><i class="fas fa-recycle"></i><span>Plastik Daur Ulang</span></div>
        <div class="product-item"><i class="fas fa-box-open"></i><span>Kardus Daur Ulang</span></div>
        <div class="product-item"><i class="fas fa-cogs"></i><span>Part Mesin Bekas</span></div>
        <div class="product-item"><i class="fas fa-glass-whiskey"></i><span>Botol Kaca</span></div>
      </div>
    </div>
  </div>
</section>


        <!-- Footer -->
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
                        <li><a href="{{ route('product') }}">Products</a></li>
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
    <script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>


