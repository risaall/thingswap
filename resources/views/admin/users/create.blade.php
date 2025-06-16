@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6">Tambah User Baru</h2>

        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded shadow">
                    <i class="fas fa-arrow-left mr-1"></i> Batal
                </a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
