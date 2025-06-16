<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Nama Produk --}}
    <div>
        <label for="name" class="block text-gray-700 font-medium mb-2">Nama Produk</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
    </div>

    {{-- Kategori --}}
    <div>
        <label for="category_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
        <select name="category_id" id="category_id" required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Stok --}}
    <div>
        <label for="stock" class="block text-gray-700 font-medium mb-2">Stok</label>
        <input type="number" name="stock" id="stock" min="0" value="{{ old('stock', $product->stock ?? '') }}" required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
    </div>

    {{-- Harga --}}
<div>
    <label for="price" class="block text-gray-700 font-medium mb-2">Harga</label>
    <input type="text" name="price" id="price" 
        value="{{ old('price', number_format($product->price ?? 0, 0, ',', '.')) }}" 
        required
        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
        oninput="formatHarga(this)">
</div>

    {{-- Jenis --}}
    <div>
        <label for="type" class="block text-gray-700 font-medium mb-2">Jenis Produk</label>
        <select name="type" id="type" required
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">-- Pilih Jenis --</option>
            <option value="sell" {{ old('type', $product->type ?? '') == 'sell' ? 'selected' : '' }}>Dijual</option>
            <option value="donation" {{ old('type', $product->type ?? '') == 'donation' ? 'selected' : '' }}>Donasi</option>
            <option value="recycled" {{ old('type', $product->type ?? '') == 'recycled' ? 'selected' : '' }}>Didaur Ulang</option>
        </select>
    </div>

    {{-- Gambar --}}
    <div>
        <label for="image" class="block text-gray-700 font-medium mb-2">Gambar Produk</label>
        <input type="file" name="image" id="image"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
        @if(isset($product) && $product->image)
            <p class="text-sm mt-2">Gambar saat ini:</p>
            <img src="{{ asset('storage/' . $product->image) }}" alt="Image" class="w-32 h-auto mt-1 rounded shadow">
        @endif
    </div>

    {{-- Deskripsi --}}
    <div class="md:col-span-2">
        <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
        <textarea name="description" id="description" rows="4"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>
</div>

{{-- Tombol --}}
<div class="mt-6">
    <button type="submit"
        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">
        {{ isset($product) ? 'Update' : 'Simpan' }}
    </button>
    <a href="{{ route('admin.products.index') }}"
        class="ml-3 text-gray-600 hover:underline">Kembali</a>
</div>
