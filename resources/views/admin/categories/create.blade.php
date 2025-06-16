@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Tambah Kategori</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block font-medium text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow">
                    <i class="fas fa-arrow-left mr-1"></i>Kembali
                </a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
