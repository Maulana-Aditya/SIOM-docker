@extends('layouts.auth')

@section('title', 'Login SIOM')

@section('content')
<div class="auth-card" data-aos="fade-up">
    <div class="auth-header text-center mb-3">
        <h3 class="mb-1">SIOM SOEPRAOEN</h3>
        <p class="mb-0">Selamat datang! Silakan masuk untuk melanjutkan.</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email"
                   type="email"
                   class="form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus
                   placeholder="contoh@email.com">
            @error('email')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <div class="d-flex justify-content-between align-items-center">
                <label for="password" class="mb-0">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-small" href="{{ route('password.request') }}">Lupa Password?</a>
                @endif
            </div>

            <div style="position: relative;">
                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="current-password"
                       placeholder="Masukkan password Anda"
                       class="form-control @error('password') is-invalid @enderror"
                       style="padding-right: 40px;">

                <i id="togglePassword"
                   class="fa-solid fa-eye"
                   style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%);
                          cursor: pointer; color: white;
                          font-size: 1.3rem;"></i>
            </div>

            @error('password')
                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        {{-- Remember Me --}}
        <div class="form-group">
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label ml-2 text-small" for="remember">
                    Ingat Saya
                </label>
            </div>
        </div>

        {{-- Submit --}}
        <div class="form-group">
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        toggle.addEventListener("click", function () {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            toggle.classList.toggle("fa-eye");
            toggle.classList.toggle("fa-eye-slash");
        });
    });
</script>
@endpush
