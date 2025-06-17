@extends('layouts.admin')

@section('title', 'Donasi')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fas fa-gift text-green-600"></i> Daftar Donasi
        </h2>
        <a href="{{ route('admin.donations.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Donasi
        </a>
    </div>

    {{-- Filter dan Pencarian --}}
    <form method="GET" action="{{ route('admin.donations.index') }}" class="mb-4 flex flex-wrap items-end gap-4">
        <div>
            <label for="status" class="text-sm text-gray-700">Filter Status</label>
            <select name="status" id="status" class="mt-1 px-3 py-2 border rounded text-sm text-gray-700">
                <option value="">-- Semua Status --</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Diterima</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label for="search" class="text-sm text-gray-700">Pencarian</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari barang atau donatur..." class="px-3 py-2 border rounded text-sm text-gray-700">
        </div>
        <button type="submit" class="h-fit px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
            <i class="fas fa-filter mr-1"></i> Terapkan
        </button>
    </form>

    {{-- Tabel Donasi --}}
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left text-gray-700 border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Barang</th>
                    <th class="px-4 py-3 border-b">Kategori</th>
                    <th class="px-4 py-3 border-b">Kondisi</th>
                    <th class="px-4 py-3 border-b">Deskripsi</th>
                    <th class="px-4 py-3 border-b">Foto</th>
                    <th class="px-4 py-3 border-b">Donatur</th>
                    <th class="px-4 py-3 border-b">Kontak</th>
                    <th class="px-4 py-3 border-b">Status</th>
                    <th class="px-4 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donations as $donation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 border-b">{{ $donation->item_name }}</td>
                        <td class="px-4 py-3 border-b">{{ $donation->category->name }}</td>
                        <td class="px-4 py-3 border-b">{{ $donation->condition }}</td>
                        <td class="px-4 py-3 border-b">{{ $donation->description }}</td>
                        <td class="px-4 py-3 border-b">
                            @if(!empty($donation->photos) && is_array($donation->photos))
                                <div class="flex gap-2">
                                    @foreach ($donation->photos as $photo)
                                        <img src="{{ asset('storage/' . $photo) }}" alt="Foto Barang" class="w-14 h-14 object-cover rounded">
                                    @endforeach
                                </div>
                            @else
                                <span class="text-gray-500 italic">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b">{{ $donation->donor_name }}</td>
                        <td class="px-4 py-3 border-b">
                            <div class="flex flex-col gap-1">
                                <span class="inline-flex items-center gap-1 text-pink-600 text-sm">
                                    <i class="fas fa-phone"></i> {{ $donation->phone }}
                                </span>
                                <span class="inline-flex items-center gap-1 text-blue-600 text-sm">
                                    <i class="fas fa-envelope"></i> {{ $donation->email }}
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-3 border-b">
                            @if($donation->status === 'accepted')
                                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Diterima</span>
                            @elseif($donation->status === 'rejected')
                                <span class="inline-block px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Ditolak</span>
                            @else
                                <span class="inline-block px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">Menunggu</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border-b text-center">
                            @if($donation->status === 'pending')
                                <div class="flex items-center justify-center space-x-2 mb-2">
                                    <form action="{{ route('admin.donations.updateStatus', ['donation' => $donation->id]) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="accepted">
                                        <button class="px-2 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.donations.updateStatus', ['donation' => $donation->id]) }}" method="POST">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button class="px-2 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('admin.donations.edit', $donation->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded text-xs hover:bg-blue-600">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.donations.destroy', $donation->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus donasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-1 bg-gray-600 text-white rounded text-xs hover:bg-gray-700">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">Belum ada data donasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
