@extends('layouts.auth')

@section('title', 'Login SIOM')

@section('content')
<div class="auth-card" data-aos="fade-up">
    
    <div class="auth-header">
        <h3>SIOM SOEPRAOEN</h3>
        <p>Selamat datang! Silakan masuk untuk melanjutkan.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Alamat Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="contoh@email.com">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <label for="password" style="margin-bottom: 0;">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-small" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Ingat Saya --}}
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">Ingat Saya</label>
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </form>

    @if (Route::has('register'))
    <div class="auth-footer">
        <p>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></p>
    </div>
    @endif

</div>
@endsection