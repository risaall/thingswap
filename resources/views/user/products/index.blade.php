@extends('layouts.product')
@section('title', 'Produk Tersedia')

@section('content')
<h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Produk Tersedia</h2>

{{-- Search dan Filter --}}
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    {{-- Form Search --}}
    <form method="GET" action="{{ route('user.products.index') }}" class="flex gap-2 w-full sm:w-auto">
        <input type="text" name="search" value="{{ request('search') }}"
            class="w-full sm:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
            placeholder="Cari nama produk...">

        <select name="type" onchange="this.form.submit()"
            class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            <option value="">Semua Jenis</option>
            <option value="sell" {{ request('type') == 'sell' ? 'selected' : '' }}>Dijual</option>
            <option value="recycled" {{ request('type') == 'recycled' ? 'selected' : '' }}>Daur Ulang</option>
        </select>

        <button type="submit"
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
            <i class="fas fa-search mr-1"></i> Cari
        </button>
    </form>
</div>

{{-- Produk --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($products as $product)
        <div class="bg-white shadow-md hover:shadow-xl rounded-2xl overflow-hidden transform hover:scale-105 transition duration-300 border border-gray-200">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <div class="p-4 flex flex-col justify-between h-[180px]">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">Stok: <span class="font-medium">{{ $product->stock }}</span></p>
                    <p class="text-green-600 font-bold text-lg">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
                <div class="mt-4">
                    <a href="{{ route('user.products.show', $product->id) }}"
                       class="inline-block w-full text-center px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition duration-200">
                        <i class="fas fa-eye mr-1"></i> Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-500">Tidak ada produk yang ditemukan.</p>
    @endforelse
</div>
@endsection
