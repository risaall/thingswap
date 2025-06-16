@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    {{-- Tombol Tambah Kategori --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold">Daftar Kategori</h2>
        <a href="{{ route('admin.categories.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-plus mr-1"></i> Tambah Kategori
        </a>
    </div>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- List Kategori --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <div class="bg-white rounded shadow p-4 flex flex-col justify-between h-full">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $category->name }}</h3>
                </div>
                <div class="mt-4 flex justify-between space-x-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white text-sm px-3 py-1 rounded">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Hapus kategori ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-1 lg:col-span-3">
                <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded">
                    Belum ada kategori.
                </div>
            </div>
        @endforelse
    </div>
@endsection
