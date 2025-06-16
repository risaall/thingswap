<!-- HALAMAN CONTRIBUTE -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contribute - EcondMart</title>
    <link rel="stylesheet" href="{{ asset('css/contribute.css') }}">
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
        <li><a href="{{ route('about') }}" >About Us</a></li>
        <li><a href="{{ route('product') }}">Products</a></li>
        <li><a href="{{ route('contribute') }}"  class="active">Contribute</a></li>
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
                    <div class="exchange-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h1>Donasikan Barangmu</h1>
                    <p>Berikan barang bekas yang sudah tidak terpakai untuk disalurkan kepada yang membutuhkan atau didaur ulang demi lingkungan yang lebih baik.</p>
                    <button class="cta-button" onclick="scrollToExchange()">
                        <i class="fas fa-arrow-right"></i>
                        Mulai Donasikan
                    </button>
                </div>
                <div class="hero-image">
                    <img src="img/donasi-barang.jpeg" alt="Donasikan Barangmu ">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <h2>Cara Kerja Donasi Barang</h2>
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h3>Upload Foto Barang</h3>
                    <p>Ambil foto barang yang ingin didonasikan dan upload ke sistem kami</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Evaluasi Admin</h3>
                    <p>Tim kami akan mengevaluasi kondisi barang dan menentukan apakah layak didonasikan atau didaur ulang</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <h3>Penyaluran atau Daur Ulang</h3>
                    <p>Barang yang layak akan disalurkan ke orang yang membutuhkan, dan yang tidak layak akan didaur ulang</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3>Dapatkan Poin</h3>
                    <p>Donatur akan mendapatkan poin yang bisa ditukar dengan barang dari katalog tersedia</p>
                </div>
            </div>
        </div>
    </section>

  <!-- Exchange Form Section -->
<section class="exchange-form" id="exchange-section">
    <div class="container">
        <h2>Form Donasi Barang</h2>
        <div class="form-container">
            <form id="exchangeForm" class="exchange-form-content" method="POST" action="{{ route('donation.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <h3>Informasi Barang Anda</h3>
                    <div class="form-group">
                        <label for="itemName">Nama Barang</label>
                        <input type="text" id="itemName" name="item_name" required>
                    </div>
                    <div class="form-group">
                        <label for="itemCategory">Kategori Barang</label>
                        <select id="itemCategory" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemCondition">Kondisi Barang</label>
                       <select id="itemCondition" name="condition" required>
                            <option value="">Pilih Kondisi</option>
                            <option value="baru">Baru (belum pernah dipakai)</option>
                            <option value="seperti-baru">Seperti Baru (hampir tidak ada cacat)</option>
                            <option value="layak-pakai">Layak Pakai (fungsi normal, ada sedikit bekas)</option>
                            <option value="rusak-ringan">Rusak Ringan (butuh sedikit perbaikan)</option>
                            <option value="rusak-berat">Rusak Berat (tidak berfungsi, bisa diambil sparepart)</option>
                            <option value="tidak-layak">Tidak Layak Pakai (rusak total, hanya untuk daur ulang)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="itemDescription">Deskripsi Produk</label>
                        <textarea id="itemDescription" name="description" rows="4" placeholder="Jelaskan kondisi dan kerusakan barang secara detail..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="itemImages">Upload Foto Barang (Maksimal 5 foto)</label>
                        <div class="file-upload">
                            <input type="file" id="itemImages" name="photos[]" multiple accept="image/*">
                            <div class="file-upload-display">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Klik untuk upload atau drag & drop foto di sini</p>
                                <small>Format: JPG, PNG, maksimal 5MB per foto</small>
                            </div>
                            <div id="imagePreview" class="image-preview"></div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h3>Informasi Kontak</h3>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="userName">Nama Lengkap</label>
                            <input type="text" id="userName" name="donor_name" required>
                        </div>
                        <div class="form-group">
                            <label for="userPhone">Nomor Telepon</label>
                            <input type="tel" id="userPhone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" id="userEmail" name="email" required>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Donasi
                    </button>
                    <button type="reset" class="reset-btn">
                        <i class="fas fa-undo"></i>
                        Reset Form
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>


    <!-- Available Items Section
    <section class="available-items">
        <div class="container">
            <h2>Barang Tersedia untuk Ditukar</h2>
            <p>Berikut adalah contoh barang-barang berkualitas yang tersedia di BekasMarket</p>
            <div class="items-grid">
                <div class="item-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Kursi Kayu">
                    <div class="item-info">
                        <h3>Kursi Kayu Jati</h3>
                        <p>Kondisi: Sangat Baik</p>
                        <span class="item-value">Nilai Tukar: 150 Poin</span>
                    </div>
                </div>
                <div class="item-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Meja Belajar">
                    <div class="item-info">
                        <h3>Meja Belajar</h3>
                        <p>Kondisi: Baik</p>
                        <span class="item-value">Nilai Tukar: 200 Poin</span>
                    </div>
                </div>
                <div class="item-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Sepatu Sneakers">
                    <div class="item-info">
                        <h3>Sepatu Sneakers</h3>
                        <p>Kondisi: Seperti Baru</p>
                        <span class="item-value">Nilai Tukar: 100 Poin</span>
                    </div>
                </div>
                <div class="item-card">
                    <img src="/placeholder.svg?height=200&width=200" alt="Tas Ransel">
                    <div class="item-info">
                        <h3>Tas Ransel</h3>
                        <p>Kondisi: Sangat Baik</p>
                        <span class="item-value">Nilai Tukar: 80 Poin</span>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

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

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <i class="fas fa-check-circle"></i>
                <h3>Permintaan Berhasil Dikirim!</h3>
                <p>Tim kami akan mengevaluasi barang Anda dalam 1-2 hari kerja. Kami akan menghubungi Anda melalui WhatsApp atau email.</p>
                <button class="modal-btn" onclick="closeModal()">Tutup</button>
            </div>
        </div>
    </div>

    <script src="tukar-barang.js"></script>
</body>
</html>

