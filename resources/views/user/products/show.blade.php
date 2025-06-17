@extends('layouts.product')
@section('title', $product->name)

@section('content')
<div class="max-w-6xl mx-auto p-6 mt-8">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-10">
        {{-- Gambar Produk --}}
        <div class="relative">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full h-full object-cover rounded-l-2xl">
        </div>

        {{-- Detail Produk --}}
        <div class="p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->name }}</h2>
                <p class="text-2xl font-extrabold text-green-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <p class="text-gray-700 text-sm mb-2">
                    <i class="fas fa-box mr-1 text-gray-500"></i>
                    <strong>Stok Tersedia:</strong> {{ $product->stock }}
                </p>

                @if($product->description)
                    <div class="mt-4">
                        <h4 class="text-lg font-semibold text-gray-800 mb-1">Deskripsi Produk</h4>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                {{-- Informasi Tambahan Dummy --}}
                <div class="mt-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Kondisi Produk</h4>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>100% layak pakai</li>
                        <li>Tidak ada kerusakan fisik</li>
                        <li>Sudah dibersihkan dan disterilisasi</li>
                        <li>Foto sesuai barang asli</li>
                    </ul>
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Lokasi & Pengambilan</h4>
                    <p class="text-gray-600">
                        Barang dapat diambil di <strong>Surabaya</strong> atau dikirim melalui kurir lokal. 
                        Silakan hubungi admin untuk informasi lebih lanjut.
                    </p>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-8 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('user.products.index') }}"
                   class="flex items-center justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Produk
                </a>

                <a href="https://wa.me/6281938006515?text=Halo%20saya%20tertarik%20dengan%20produk:%20{{ urlencode($product->name) }}"
                   target="_blank"
                   class="flex items-center justify-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition">
                    <i class="fab fa-whatsapp mr-2"></i> Hubungi Penjual
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
