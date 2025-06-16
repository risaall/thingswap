@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="auth-box shadow p-4 bg-white rounded">
    <h3 class="mb-4 text-center text-success">Daftar</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="password_confirmation" type="password"
                   class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Daftar</button>

        <p class="mt-3 text-center">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-success">Login di sini</a>
        </p>
    </form>
</div>
@endsection
