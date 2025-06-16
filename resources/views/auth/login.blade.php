@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-box shadow p-4 bg-white rounded">
    <h3 class="mb-4 text-center text-success">Login</h3>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus>
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

        <div class="mb-3 form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-success w-100">Masuk</button>

        <p class="mt-3 text-center">
            Belum punya akun? <a href="{{ route('register') }}" class="text-success">Daftar sekarang</a>
        </p>
    </form>
</div>
@endsection
