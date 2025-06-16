@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">User List</h2>
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">+ Add User</a>
</div>

@if (session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded shadow">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($users as $index => $user)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('admin.users.edit', $user) }}" class="text-yellow-500 hover:text-yellow-600 font-medium mr-3">Edit</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700 font-medium">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $users->links('pagination::tailwind') }}
</div>
@endsection
