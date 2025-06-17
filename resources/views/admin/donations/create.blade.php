@extends('layouts.admin')

@section('title', 'Tambah Donasi')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Form Donasi Barang</h2>

    <form action="{{ route('admin.donations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Barang -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Barang</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" name="item_name" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kategori Barang</label>
                    <select name="category_id" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kondisi Barang</label>
                    <select name="condition" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Kondisi</option>
                        <option value="baru">Baru (belum pernah dipakai)</option>
                        <option value="seperti-baru">Seperti Baru (hampir tidak ada cacat)</option>
                        <option value="layak-pakai">Layak Pakai (fungsi normal, ada sedikit bekas)</option>
                        <option value="rusak-ringan">Rusak Ringan (butuh sedikit perbaikan)</option>
                        <option value="rusak-berat">Rusak Berat (tidak berfungsi, bisa diambil sparepart)</option>
                        <option value="tidak-layak">Tidak Layak Pakai (rusak total, hanya untuk daur ulang)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                    <textarea name="description" class="w-full mt-1 p-2 border rounded" rows="4"
                        placeholder="Jelaskan kondisi dan kerusakan barang secara detail..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Upload Foto Barang (maks 5 foto)</label>
                    <input type="file" name="photos[]" class="w-full mt-1 p-2 border rounded" multiple accept="image/jpeg,image/png,image/jpg">
                    <small class="text-gray-500 block mt-1">Format: JPG, PNG. Maks 5MB per foto.</small>
                </div>
            </div>

            <!-- Informasi Kontak -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Kontak Donatur</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="donor_name" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="tel" name="phone" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full mt-1 p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" class="w-full mt-1 p-2 border rounded" required>
                        <option value="pending" selected>Menunggu</option>
                        <option value="accepted">Diterima</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end mt-6 gap-4">
            <button type="reset" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100">
                <i class="fas fa-undo mr-1"></i> Reset
            </button>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-paper-plane mr-1"></i> Simpan Donasi
            </button>
        </div>
    </form>
</div>
@endsection
