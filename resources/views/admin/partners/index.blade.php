@extends('layouts.admin')

@section('title', 'Moderasi Donasi')

@section('head')
<!-- Lightbox2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">🛍️ Moderasi Donasi</h2>
</div>

{{-- Filter --}}
<form method="GET" class="flex flex-wrap items-end gap-4 mb-6">
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" id="status" class="mt-1 block w-40 rounded border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500 text-sm">
            <option value="">-- Semua Status --</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
            <option value="accepted" {{ request('status') === 'accepted' ? 'selected' : '' }}>Diterima</option>
            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
        </select>
    </div>
    <div>
        <button type="submit" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow text-sm">
            🔍 Filter
        </button>
    </div>
</form>

{{-- Flash --}}
@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Tabel --}}
<div class="overflow-x-auto bg-white rounded shadow">
    <table class="min-w-full table-auto text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-700 font-semibold">
            <tr>
                <th class="px-4 py-3 border-b">ID</th>
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
            @forelse($donations as $donation)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-3 border-b">{{ $donation->id }}</td>
                <td class="px-4 py-3 border-b">{{ $donation->item_name }}</td>
                <td class="px-4 py-3 border-b">{{ $donation->category->name ?? '-' }}</td>
                <td class="px-4 py-3 border-b">
                    <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-800 text-xs">
                        {{ ucfirst(str_replace('-', ' ', $donation->condition)) }}
                    </span>
                </td>
                <td class="px-4 py-3 border-b">{{ $donation->description }}</td>
                <td class="px-4 py-3 border-b space-x-1">
                    @if ($donation->photos)
                        @foreach ($donation->photos as $photo)
                            <a href="{{ asset('storage/' . $photo) }}" data-lightbox="donation-{{ $donation->id }}">
                                <img src="{{ asset('storage/' . $photo) }}" class="w-14 h-14 object-cover rounded inline-block" alt="Foto">
                            </a>
                        @endforeach
                    @else
                        <span class="text-gray-500 italic">Tidak ada</span>
                    @endif
                </td>
                <td class="px-4 py-3 border-b">{{ $donation->donor_name }}</td>
                <td class="px-4 py-3 border-b text-xs">
                    📞 {{ $donation->phone }}<br>
                    📧 {{ $donation->email }}
                </td>
                <td class="px-4 py-3 border-b">
                    @if ($donation->status === 'accepted')
                        <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded text-xs">Diterima</span>
                    @elseif ($donation->status === 'rejected')
                        <span class="inline-block px-2 py-1 bg-red-100 text-red-800 rounded text-xs">Ditolak</span>
                    @else
                        <span class="inline-block px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs">Menunggu</span>
                    @endif
                </td>
                <td class="px-4 py-3 border-b text-center">
                    @if ($donation->status === 'pending')
                        <div class="flex items-center justify-center space-x-2">
                            <form method="POST" action="{{ route('admin.donations.updateStatus', $donation->id) }}">
                                @csrf
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs shadow">
                                    ✔️ Terima
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.donations.updateStatus', $donation->id) }}">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="inline-flex items-center bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs shadow">
                                    ❌ Tolak
                                </button>
                            </form>
                        </div>
                    @else
                        <span class="text-gray-400 text-xs">-</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center py-4 text-gray-500">Belum ada donasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endsection
