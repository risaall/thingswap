@extends('layouts.admin')

@section('title', 'Tambah Mitra')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tambah Mitra Baru</h2>

    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Mitra</label>
            <input type="text" name="name" value="{{ old('name') }}"
                required
                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Mitra</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="address" rows="3"
                class="mt-1 block w-full border-2 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('address') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo (Opsional)</label>
            <input type="file" name="logo"
                class="block w-full text-sm text-gray-700 border-2 border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="flex justify-end space-x-2 mt-6">
            <a href="{{ route('admin.partners.index') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">
                Kembali
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
