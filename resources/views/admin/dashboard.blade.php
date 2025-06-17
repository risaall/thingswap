@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <main class="flex-1 p-8">
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Welcome Back, Admin!</h1>

        {{-- Stats Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Total Users</h2>
                <p class="text-2xl font-bold">{{ $userCount }}</p>
            </div>
            <i class="fas fa-users text-xl text-blue-500"></i>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Donor Users</h2>
                <p class="text-2xl font-bold">{{ $donorUserCount }}</p>
            </div>
            <i class="fas fa-user-check text-xl text-indigo-500"></i>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Sell Products</h2>
                <p class="text-2xl font-bold">{{ $productCount }}</p>
            </div>
            <i class="fas fa-box text-xl text-green-500"></i>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Donations</h2>
                <p class="text-2xl font-bold">{{ $donationCount }}</p>
            </div>
            <i class="fas fa-gift text-xl text-purple-500"></i>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Recycled Items</h2>
                <p class="text-2xl font-bold">{{ $recycledCount }}</p>
            </div>
            <i class="fas fa-recycle text-xl text-yellow-500"></i>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
        <div class="flex items-center">
            <div class="flex-1">
                <h2 class="text-gray-600 text-sm">Partners</h2>
                <p class="text-2xl font-bold">{{ $partnerCount }}</p>
            </div>
            <i class="fas fa-handshake text-xl text-red-500"></i>
        </div>
    </div>
</div>


        {{-- Recent Donations Table --}}
        @if(isset($donations) && $donations->count() > 0)
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-4 py-3 border-b">
                    <h2 class="text-lg font-semibold text-gray-700">Recent Donations</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Category</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($donations as $donation)
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $donation->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $donation->category->name ?? '-' }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $donation->status === 'diterima' ? 'bg-green-100 text-green-800' : 
                                               ($donation->status === 'ditolak' ? 'bg-red-100 text-red-800' : 
                                               'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($donation->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t">
                    {{ $donations->links() }}
                </div>
            </div>
        @endif
    </main>
</div>
@endsection
