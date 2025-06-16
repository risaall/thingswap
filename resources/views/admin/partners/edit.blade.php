@extends('layouts.admin')

@section('title', 'Edit Mitra')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Edit Mitra: {{ $partner->name }}</h2>

    <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Mitra</label>
            <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Mitra</label>
            <input type="email" name="email" value="{{ old('email', $partner->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">No. Telepon</label>
            <input type="text" name="phone" value="{{ old('phone', $partner->phone) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
        </div>

        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea name="address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('address', $partner->address) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
            @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="w-20 h-20 object-cover rounded mb-2">
            @endif
            <input type="file" name="logo" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
        </div>

        <div class="flex justify-end space-x-2 mt-6">
            <a href="{{ route('admin.partners.index') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded">
                Kembali
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded shadow">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
