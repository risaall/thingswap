<!-- LAYANAN JUAL / BELI BARANG -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Barang - EcondMart</title>
    <link rel="stylesheet" href="{{ asset('css/buyproduct.css') }}">
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
        <li><a href="{{ route('user.products.index) }}">Products</a></li>
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
                    <div class="sell-icon">
                        <i class="fas fa-cube"></i>
                    </div>
                    <h1>Beli Barang</h1>
                    <p>Temukan barang berkualitas dengan harga terjangkau dari BekasMarket. Semua barang telah melalui proses kurasi dan renovasi untuk memastikan kualitas terbaik.</p>
                    <button class="cta-button" onclick="scrollToProducts()">
                        <i class="fas fa-shopping-cart"></i>
                        Lihat Produk
                    </button>
                </div>
                <div class="hero-image">
                    <img src="img/utama.jpeg" alt="Jual barang berkualitas BekasMarket">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Mengapa Berbelanja di BekasMarket?</h2>
            <div class="features-grid">
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Kualitas Terjamin</h3>
                    <p>Semua barang telah melalui proses inspeksi dan renovasi untuk memastikan kualitas terbaik</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <h3>Harga Terjangkau</h3>
                    <p>Dapatkan barang berkualitas dengan harga yang lebih terjangkau dibanding barang baru</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Ramah Lingkungan</h3>
                    <p>Berkontribusi dalam mengurangi limbah dengan membeli barang daur ulang</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Pengiriman Cepat</h3>
                    <p>Layanan pengiriman ke seluruh Indonesia dengan packaging yang aman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section" id="products-section">
        <div class="container">
            <div class="filter-header">
                <h2>Katalog Produk</h2>
                <div class="filter-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" id="searchInput" placeholder="Cari produk...">
                    </div>
                    <select id="categoryFilter">
                        <option value="">Semua Kategori</option>
                        <option value="furniture">Furniture</option>
                        <option value="elektronik">Elektronik</option>
                        <option value="pakaian">Pakaian</option>
                        <option value="sepatu">Sepatu</option>
                        <option value="tas">Tas</option>
                        <option value="olahraga">Olahraga</option>
                    </select>
                    <select id="priceFilter">
                        <option value="">Semua Harga</option>
                        <option value="0-100000">Di bawah Rp 100.000</option>
                        <option value="100000-500000">Rp 100.000 - 500.000</option>
                        <option value="500000-1000000">Rp 500.000 - 1.000.000</option>
                        <option value="1000000-999999999">Di atas Rp 1.000.000</option>
                    </select>
                    <select id="conditionFilter">
                        <option value="">Semua Kondisi</option>
                        <option value="seperti-baru">Seperti Baru</option>
                        <option value="sangat-baik">Sangat Baik</option>
                        <option value="baik">Baik</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products">
        <div class="container">
            <div class="products-grid" id="productsGrid">
                <!-- Products will be loaded here by JavaScript -->
            </div>
            <div class="load-more">
                <button id="loadMoreBtn" class="load-more-btn">
                    <i class="fas fa-plus"></i>
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3><i class="fas fa-shopping-cart"></i> Keranjang Belanja</h3>
            <button class="close-cart" onclick="toggleCart()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="cart-items" id="cartItems">
            <!-- Cart items will be loaded here -->
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <strong>Total: <span id="cartTotal">Rp 0</span></strong>
            </div>
            <button class="checkout-btn" onclick="checkout()">
                <i class="fas fa-credit-card"></i>
                Checkout
            </button>
        </div>
    </div>

    <!-- Cart Toggle Button -->
    <button class="cart-toggle" onclick="toggleCart()">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count" id="cartCount">0</span>
    </button>

    <!-- Product Modal -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeProductModal()">&times;</span>
            <div class="modal-body" id="modalBody">
                <!-- Product details will be loaded here -->
            </div>
        </div>
    </div>

    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCheckoutModal()">&times;</span>
            <div class="modal-body">
                <h2><i class="fas fa-credit-card"></i> Checkout</h2>
                <form id="checkoutForm">
                    <div class="form-section">
                        <h3>Informasi Pembeli</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="buyerName">Nama Lengkap</label>
                                <input type="text" id="buyerName" required>
                            </div>
                            <div class="form-group">
                                <label for="buyerPhone">Nomor Telepon</label>
                                <input type="tel" id="buyerPhone" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="buyerEmail">Email</label>
                            <input type="email" id="buyerEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="buyerAddress">Alamat Pengiriman</label>
                            <textarea id="buyerAddress" rows="3" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-section">
                        <h3>Metode Pembayaran</h3>
                        <div class="payment-methods">
                            <label class="payment-option">
                                <input type="radio" name="payment" value="transfer" checked>
                                <span class="payment-label">
                                    <i class="fas fa-university"></i>
                                    Transfer Bank
                                </span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="payment" value="cod">
                                <span class="payment-label">
                                    <i class="fas fa-money-bill-wave"></i>
                                    Cash on Delivery
                                </span>
                            </label>
                            <label class="payment-option">
                                <input type="radio" name="payment" value="ewallet">
                                <span class="payment-label">
                                    <i class="fas fa-mobile-alt"></i>
                                    E-Wallet
                                </span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="order-summary">
                        <h3>Ringkasan Pesanan</h3>
                        <div id="orderSummary"></div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="submit-order-btn">
                            <i class="fas fa-check"></i>
                            Konfirmasi Pesanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-body success-body">
                <i class="fas fa-check-circle"></i>
                <h3>Pesanan Berhasil!</h3>
                <p>Terima kasih atas pesanan Anda. Kami akan segera memproses pesanan dan menghubungi Anda untuk konfirmasi.</p>
                <div class="order-info">
                    <p><strong>Nomor Pesanan:</strong> <span id="orderNumber"></span></p>
                    <p><strong>Total Pembayaran:</strong> <span id="orderTotal"></span></p>
                </div>
                <button class="modal-btn" onclick="closeSuccessModal()">Tutup</button>
            </div>
        </div>
    </div>

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

    <script src="js/script.js"></script>
</body>
</html>

