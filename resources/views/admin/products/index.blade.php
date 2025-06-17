@extends('layouts.admin')

@section('title', 'Produk')

@section('head')
<!-- Lightbox2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Produk</h2>
        <a href="{{ route('admin.products.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($products->isEmpty())
        <div class="text-center text-gray-500">Tidak ada produk yang tersedia.</div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    <div class="relative">
                        @if($product->image)
                            <a href="{{ asset('storage/' . $product->image) }}" data-lightbox="product-{{ $product->id }}">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            </a>
                        @else
                            <img src="https://via.placeholder.com/300x200" alt="No Image" class="w-full h-48 object-cover">
                        @endif
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600 mb-1">Kategori: <span class="font-medium">{{ $product->category->name ?? '-' }}</span></p>
                        <p class="text-sm text-gray-600 mb-1">Stok: <span class="font-medium">{{ $product->stock }}</span></p>
                        <p class="text-sm text-gray-600 mb-1">Tujuan Barang:
                            <span class="inline-block px-2 py-1 rounded text-white text-xs
                                @if($product->type === 'sell') bg-blue-500
                                @elseif($product->type === 'donation') bg-green-500
                                @elseif($product->type === 'recycled') bg-yellow-500
                                @else bg-gray-400 @endif">
                                @if($product->type === 'sell')
                                    Dijual
                                @elseif($product->type === 'donation')
                                    Donasi
                                @elseif($product->type === 'recycled')
                                    Didaur Ulang
                                @else
                                    Tidak Diketahui
                                @endif
                            </span>
                        </p>
                        <p class="text-sm text-gray-800 mb-3">Harga: 
                            <span class="font-bold text-green-600">Rp {{ number_format((float) $product->price, 0, ',', '.') }}</span>
                        </p>
                        <div class="mt-auto flex justify-between items-center space-x-2">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@section('scripts')
<!-- Lightbox2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endsection
