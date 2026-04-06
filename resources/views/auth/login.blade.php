<x-guest-layout>
    <div class="row shadow-lg" style="min-height: 80vh; border-radius: 15px; overflow: hidden; background: white;">
        <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-5 text-center text-white"
            style="background: #b1944a;">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="120" class="mb-4">
            <h4 class="fw-bold px-3" style="line-height: 1.5;">Lakukan reservasi sekarang demi solusi kesehatan wajah anda!</h4>
        </div>

        <div class="col-md-7 p-5 d-flex flex-column justify-content-center">
            <div class="px-md-4">
                <h2 class="fw-bold text-center mb-2" style="color: #b1944a;">Silahkan Masuk</h2>
                <p class="text-center text-muted mb-4 small">Silahkan masukkan email dan password <br> yang sudah terdaftar.</p>

                <x-auth-session-status class="mb-4 text-success small text-center" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Email</label>
                        <input id="email" type="email" name="email"
                            class="form-control rounded-pill border-secondary py-2 @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required autofocus placeholder="nama@email.com">

                        @error('email')
                            <div class="invalid-feedback ms-2" style="font-size: 0.75rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label small fw-bold text-muted">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-decoration-none fw-bold" style="color: #b1944a;">Lupa?</a>
                            @endif
                        </div>
                        <div class="input-group">
                            <input id="password" type="password" name="password"
                                class="form-control rounded-pill border-secondary py-2 @error('password') is-invalid @enderror"
                                required placeholder="********">
                        </div>

                        @error('password')
                            <div class="invalid-feedback ms-2 d-block" style="font-size: 0.75rem;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4 form-check ms-2">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember">
                        <label class="form-check-label small text-muted" for="remember">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn w-100 rounded-pill py-2 fw-bold text-white shadow-sm btn-masuk"
                            style="background-color: #8b7336; border: none;">
                        Masuk
                    </button>
                </form>

                <p class="text-center mt-4 text-muted small">
                    Tidak punya akun? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #8b7336;">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>

    <style>
        .btn-masuk:hover {
            background-color: #a38944 !important;
            transform: translateY(-1px);
            transition: 0.2s;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
</x-guest-layout>
