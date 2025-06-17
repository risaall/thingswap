@extends('layouts.admin')

@section('title', 'Edit Donasi')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Donasi Barang</h2>

    <form action="{{ route('admin.donations.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informasi Barang -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Barang</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                    <input type="text" name="item_name" class="w-full mt-1 p-2 border rounded" value="{{ old('item_name', $donation->item_name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kategori Barang</label>
                    <select name="category_id" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $donation->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kondisi Barang</label>
                    <select name="condition" class="w-full mt-1 p-2 border rounded" required>
                        <option value="">Pilih Kondisi</option>
                        @php
                            $conditions = [
                                'baru' => 'Baru (belum pernah dipakai)',
                                'seperti-baru' => 'Seperti Baru (hampir tidak ada cacat)',
                                'layak-pakai' => 'Layak Pakai (fungsi normal, ada sedikit bekas)',
                                'rusak-ringan' => 'Rusak Ringan (butuh sedikit perbaikan)',
                                'rusak-berat' => 'Rusak Berat (tidak berfungsi, bisa diambil sparepart)',
                                'tidak-layak' => 'Tidak Layak Pakai (rusak total, hanya untuk daur ulang)'
                            ];
                        @endphp
                        @foreach ($conditions as $key => $label)
                            <option value="{{ $key }}" {{ $donation->condition == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi Produk</label>
                    <textarea name="description" class="w-full mt-1 p-2 border rounded" rows="4">{{ old('description', $donation->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Upload Foto Barang (opsional)</label>
                    <input type="file" name="photos[]" class="w-full mt-1 p-2 border rounded" multiple accept="image/*">
                    <small class="text-gray-500 block mt-1">Format: JPG, PNG. Maks 5MB per foto.</small>

                    @if (is_array($donation->photos) && count($donation->photos) > 0)
                        <div class="grid grid-cols-2 gap-2 mt-3">
                            @foreach ($donation->photos as $photo)
                                <img src="{{ asset('storage/' . $photo) }}" alt="Foto Barang" class="h-24 w-auto object-cover rounded">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Informasi Kontak -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Kontak Donatur</h3>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="donor_name" class="w-full mt-1 p-2 border rounded" value="{{ old('donor_name', $donation->donor_name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="tel" name="phone" class="w-full mt-1 p-2 border rounded" value="{{ old('phone', $donation->phone) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full mt-1 p-2 border rounded" value="{{ old('email', $donation->email) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" class="w-full mt-1 p-2 border rounded">
                        <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="accepted" {{ $donation->status == 'accepted' ? 'selected' : '' }}>Diterima</option>
                        <option value="rejected" {{ $donation->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end mt-6 gap-4">
            <a href="{{ route('admin.donations.index') }}" class="px-4 py-2 border rounded text-gray-700 hover:bg-gray-100">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-save mr-1"></i> Update Donasi
            </button>
        </div>
    </form>
</div>
@endsection
