@extends('layouts.admin')

@section('title', 'Daftar Mitra')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Mitra</h2>
        <a href="{{ route('admin.partners.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-plus mr-1"></i> Tambah Mitra
        </a>
    </div>

    @if ($partners->count())
        <div class="overflow-x-auto border border-gray-200 rounded">
            <table class="min-w-full bg-white text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase">
                    <tr>
                        <th class="px-4 py-3 border-b">#</th>
                        <th class="px-4 py-3 border-b">Nama</th>
                        <th class="px-4 py-3 border-b">Email</th>
                        <th class="px-4 py-3 border-b">Telepon</th>
                        <th class="px-4 py-3 border-b">Alamat</th>
                        <th class="px-4 py-3 border-b">Logo</th>
                        <th class="px-4 py-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 divide-y divide-gray-200">
                    @foreach ($partners as $index => $partner)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium">{{ $partner->name }}</td>
                            <td class="px-4 py-3">{{ $partner->email }}</td>
                            <td class="px-4 py-3">{{ $partner->phone }}</td>
                            <td class="px-4 py-3">{{ $partner->address }}</td>
                            <td class="px-4 py-3">
                                @if ($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo" class="h-10 rounded shadow-sm">
                                @else
                                    <span class="text-gray-500 italic">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center whitespace-nowrap">
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-3" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-gray-600">Belum ada data mitra.</p>
    @endif
</div>
@endsection
