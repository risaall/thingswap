@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="flex min-h-screen bg-gray-100">

    {{-- Main Content --}}
    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Welcome Back, Admin!</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Users --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Users</h2>
                    <i class="fas fa-users text-2xl text-green-500"></i>
                </div>
                <p class="text-4xl font-bold text-green-600">{{ $userCount }}</p>
            </div>

            {{-- Donors --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Donors</h2>
                    <i class="fas fa-hand-holding-heart text-2xl text-pink-500"></i>
                </div>
                <p class="text-4xl font-bold text-pink-600">{{ $donorUserCount }}</p>
            </div>

            {{-- Products --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Products</h2>
                    <i class="fas fa-box-open text-2xl text-blue-500"></i>
                </div>
                <p class="text-4xl font-bold text-blue-600">{{ $productCount }}</p>
            </div>

            {{-- Donations --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Donations</h2>
                    <i class="fas fa-gift text-2xl text-orange-500"></i>
                </div>
                <p class="text-4xl font-bold text-orange-600">{{ $donationCount }}</p>
            </div>

            {{-- Recycled --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Recycled Items</h2>
                    <i class="fas fa-recycle text-2xl text-teal-500"></i>
                </div>
                <p class="text-4xl font-bold text-teal-600">{{ $recycledCount }}</p>
            </div>

            {{-- Partners --}}
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-700">Partners</h2>
                    <i class="fas fa-handshake text-2xl text-purple-500"></i>
                </div>
                <p class="text-4xl font-bold text-purple-600">{{ $partnerCount }}</p>
            </div>

        </div>
    </main>
</div>
@endsection
