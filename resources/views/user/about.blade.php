<!-- HALAMAN TENTANG KAMI -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - EcondMart</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
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
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}" class="active">About Us</a></li>
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
                <h2>Where Preloved <br> Finds New Love</h2>
                <p>#EcondMartForEveryone</p>
                <div class="hero-image">
                    <img src="img/donasi-barang-bekas.jpeg" alt="Recycling bin with plastic bottles and waste materials">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
<section class="mission">
    <div class="container">
        <div class="mission-content">
            <div class="mission-visual">
                <div class="recycle-symbol">
                    <!-- Ikon Donasi dan Daur Ulang secara vertikal -->
                    <div class="symbol-icons vertical-icons">
                        <!-- Ikon Donasi -->
                        <div class="icon-wrapper">
                            <i class="fas fa-hand-holding-heart"></i>
                            <span>DONATE</span>
                        </div>
                        <!-- Ikon Daur Ulang -->
                        <div class="icon-wrapper">
                            <i class="fas fa-recycle"></i>
                            <span>RECYCLE</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mission-text">
    <h2>Misi Kami: Menyalurkan Barang Layak Pakai dan Mendaur Ulang Barang Tidak Terpakai</h2>
    <div class="mission-description">
        <p>Setiap tahun, jutaan barang terbuang sia-sia, padahal sebagian masih layak pakai atau dapat didaur ulang. Tanpa penanganan yang tepat, barang-barang ini berakhir sebagai limbah yang mencemari lingkungan.</p>

        <p>Kami hadir untuk menjadi solusi. Barang yang masih layak pakai kami salurkan kepada mereka yang membutuhkan. Sementara barang yang tidak dapat digunakan lagi, kami bantu proses daur ulangnya secara bertanggung jawab.</p>

        <p>Dengan dukungan jutaan pengguna dan jaringan lokal di seluruh Indonesia, kami membangun sistem distribusi dan daur ulang yang terintegrasi. Kami percaya, perubahan besar dimulai dari kesadaran dan aksi bersama.</p>

        <p>Bersama, mari wujudkan Indonesia yang lebih bersih, berdaya, dan peduli lingkungan.</p>
    </div>
</div>

        </div>
    </div>
</section>



<!-- Design Philosophy Section -->
<section class="design-philosophy">
    <div class="container">
        <div class="design-content">
            <div class="design-text">
                <h2>EcondMart hadir untuk menyalurkan barang layak pakai dan mendaur ulang barang tidak layak pakai</h2>
                <p>Daripada menumpuk menjadi sampah, barang yang masih berfungsi bisa disalurkan kepada mereka yang membutuhkan. Sementara barang yang benar-benar sudah tidak bisa digunakan lagi akan masuk ke sistem daur ulang. Dengan menggabungkan jaringan pengguna dan titik pengumpulan lokal, kami membangun ekosistem berkelanjutan untuk mengurangi limbah dan meningkatkan manfaat sosial dari barang-barang yang terlantar.</p>
            </div>
            <div class="design-image">
                <img src="img/daur-ulang.jpeg" alt="Orang membawa barang layak pakai dan barang daur ulang">
            </div>
        </div>
    </div>
</section>



    <!-- Solutions Section -->
    <section class="solutions">
        <div class="container">
            <div class="solutions-header">
                <h2>Solusi Kami</h2>
                </div>
            </div>

            <div class="solutions-grid">
                

                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Beli Barang</h3>
                    <p>Dapatkan produk bekas berkualitas dengan harga terjangkau sekaligus berkontribusi pada gerakan pengurangan limbah dan konsumsi berkelanjutan.</p>
                </div>

                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h3>Jual Barang</h3>
                    <p>Platform kami memungkinkan Anda menjual barang-barang bekas yang masih layak pakai dengan mudah dan cepat, serta membantu memperpanjang siklus hidup barang tersebut.</p>
                </div>

                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Donasi Barang</h3>
                    <p>Salurkan barang bekas layak pakai Anda kepada mereka yang membutuhkan, dan bantu ciptakan dampak positif di masyarakat.</p>
                </div>

                <div class="solution-card">
                    <div class="solution-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h3>Daur Ulang</h3>
                    <p>Barang yang tidak layak pakai lagi tidak harus dibuang. Kami bantu untuk mengelolanya secara ramah lingkungan melalui mitra daur ulang kami.</p>
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
</body>
</html>
