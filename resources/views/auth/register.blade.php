<x-guest-layout>
    <div class="row shadow-lg" style="min-height: 85vh; border-radius: 15px; overflow: hidden;">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center p-5 text-center text-white"
            style="background: #b1944a;">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="300" class="mb-4">
            <h4 class="text-start text-dark">Lakukan reservasi sekarang demi solusi kesehatan wajah anda!</h4>
        </div>

        <div class="col-md-8 p-4 bg-white">
            <h2 class="fw-bold text-center mb-2 mt-5" style="color: #b1944a;">Registrasi Akun</h2>
            <p class="text-center text-muted small">Silahkan lengkapi data untuk menggunakan layanan kami</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row px-md-3">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Nama Lengkap</label>
                            <input name="name" type="text" class="form-control rounded-pill @error('name') is-invalid @enderror py-2"
                                value="{{ old('name') }}" required placeholder="Masukkan nama lengkap">
                            @error('name') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Alamat Email</label>
                            <input name="email" type="email" class="form-control rounded-pill @error('email') is-invalid @enderror py-2"
                                value="{{ old('email') }}" required placeholder="contoh@mail.com">
                            @error('email') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Password</label>
                            <input name="password" type="password" class="form-control rounded-pill @error('password') is-invalid @enderror py-2"
                                required placeholder="Min. 8 karakter">
                            @error('password') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Konfirmasi Password</label>
                            <input name="password_confirmation" type="password" class="form-control rounded-pill py-2"
                                required placeholder="Ulangi password">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Nomor WhatsApp</label>
                            <input name="no_tlp" type="text" class="form-control rounded-pill @error('no_tlp') is-invalid @enderror py-2"
                                value="{{ old('no_tlp') }}" placeholder="Contoh: 0812345678" required>
                            @error('no_tlp') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-2">
                            <label class="small fw-bold text-muted mb-1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select rounded-pill @error('jenis_kelamin') is-invalid @enderror py-2">
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="small fw-bold text-muted mb-1">Alamat Lengkap</label>
                            <input name="address" type="text" class="form-control rounded-pill @error('address') is-invalid @enderror py-2"
                                value="{{ old('address') }}" required placeholder="Masukkan alamat domisili">
                            @error('address') <div class="invalid-feedback small ms-2">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn rounded-pill px-5 py-2 fw-bold text-white shadow-sm transition-hover"
                            style="background-color: #8b7336;">
                        Registrasi Sekarang
                    </button>
                    <p class="mt-3 text-muted small">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #8b7336;">Masuk</a></p>
                </div>
            </form>
        </div>
    </div>

    <style>
        .form-control:focus, .form-select:focus {
            border-color: #b1944a;
            box-shadow: 0 0 0 0.25 margin-left: 0.5rem;
        }
        .transition-hover:hover {
            transform: scale(1.02);
            background-color: #a38944 !important;
            transition: 0.3s;
        }
        .invalid-feedback {
            font-size: 0.75rem;
            font-weight: 500;
        }
    </style>
</x-guest-layout>
