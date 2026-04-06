<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jglow Clinic - Website Reservasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --gold-main: #dcb752;
            --gold-light: #ab945c;
        }

        html {
            scroll-behavior: smooth;
        }

        .text-gold {
            color: var(--gold-main) !important;
        }

        .hover-gold:hover {
            color: var(--gold-main) !important;
            padding-left: 5px;
            transition: 0.3s;
        }

        .ls-2 {
            letter-spacing: 2px;
        }

        .text-gold {
            color: #a38944;
        }

        .bg-gold {
            background-color: #a38944;
        }

        .transition-hover:hover {
            transform: scale(1.05);
            border-color: #a38944 !important;
            transition: 0.3s;
        }

        .transform-up {
            transition: transform 0.5s ease;
        }

        .transform-up:hover {
            transform: translateY(-10px);
        }

        .bg-gradient-dark {
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        }

        footer {
            font-size: 0.9rem;
        }

        .service-card {
            transition: transform 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        body {
            background-color: #f8f9fa;
            padding-top: 80px;
            font-family: 'Poppins', sans-serif;
        }

        .navbar {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 15px 0;
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 15px;
            position: relative;
            transition: 0.3s;
            padding: 5px 0;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--gold-main);
            transition: width 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: var(--gold-main) !important;
        }

        .btn-gold {
            background-color: var(--gold-main);
            color: white !important;
            border-radius: 50px;
            padding: 8px 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-gold:hover {
            background-color: #c9a240;
            transform: translateY(-2px);
        }

        .btn-outline-gold {
            border: 2px solid var(--gold-main);
            color: var(--gold-main) !important;
            background-color: transparent;
            border-radius: 50px;
            padding: 8px 25px;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-outline-gold:hover {
            background-color: var(--gold-main) !important;
            color: white !important;
            border-color: var(--gold-main) !important;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(163, 137, 68, 0.3);
        }

        .btn-outline-gold:active {
            transform: translateY(-1px);
        }

        .bg-gold-light {
            background-color: #c5ae73;
        }

        .btn-reservasi {
            display: inline-block;
            width: fit-content;
            padding: 12px 35px;
            background-color: white;
            color: #7d6b3d !important;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-decoration: none;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transition: all 0.3s ease-in-out;
            border: 2px solid white;
        }

        .btn-reservasi:hover {
            background-color: transparent;
            color: white !important;
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            border: 2px solid white;
        }

        .btn-reservasi:active {
            transform: translateY(-2px);
        }

        .italic {
            font-style: italic;
        }

        .review-card {
            transition: all 0.3s ease-in-out;
        }

        .review-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(163, 137, 68, 0.15) !important;
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #fdfbf7 0%, #f1e9d2 100%);
            border-radius: 20px;
            color: #a38944;
            transition: all 0.4s ease;
        }

        .feature-card {
            background: #ffffff;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid #f8f9fa !important;
        }

        .feature-card:hover {
            transform: translateY(-12px);
            background: #fff;
            box-shadow: 0 20px 40px rgba(163, 137, 68, 0.12) !important;
            border-bottom: 4px solid #a38944 !important;
        }

        .feature-card:hover .icon-box {
            background: #a38944;
            color: #fff;
            transform: rotateY(360deg);
        }

        .border-transparent {
            border-bottom-color: transparent !important;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
            <img src="{{ asset('logo.png') }}" alt="Logo" width="100" height="50px">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}" href="#home">Home</a>
                    </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->is('reservasi*') ? 'active' : '' }}" href="/reservasi">Reservasi</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->is('riwayat*') ? 'active' : '' }}" href="/riwayat">Riwayat</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->is('riwayat*') ? 'active' : '' }}" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold {{ request()->is('riwayat*') ? 'active' : '' }}" href="#contact">Contact</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center gap-2">
                        @guest
                        <a href="{{ route('login') }}" class="nav-link text-dark fw-bold me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-gold">Daftar</a>
                        @endguest

                        @auth
                        <div class="dropdown">
                            <button class="btn btn-outline-gold dropdown-toggle d-flex align-items-center gap-2 shadow-sm" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fs-5"></i>
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2 rounded-4" aria-labelledby="userMenu">
                                @if(Auth::user()->hasRole('super_admin'))
                                <li>
                                    <a class="dropdown-item rounded-3 py-2 text-primary fw-bold" href="/admin">
                                        Dashboard Admin
                                    </a>
                                </li>
                                @endif

                                @if(Auth::user()->hasRole('Pasien'))
                                    <li class="nav-item">
                                        <a class="nav-link fw-bold {{ request()->is('profil*') ? 'active' : '' }}" href="/profil">Profil</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item rounded-3 py-2" href="/profil">
                                            <i class="fas fa-user-edit me-2 text-info"></i> Profil Saya
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item rounded-3 py-2" href="/riwayat">
                                            <i class="fas fa-clock-rotate-left me-2 text-warning"></i> Riwayat Reservasi
                                        </a>
                                    </li>
                                @endif

                                <li><hr class="dropdown-divider"></li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item rounded-3 py-2 fw-bold text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i> Keluar
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        {{ $slot }}
    </div>

    <footer class="mt-5 pt-5 pb-4 bg-white border-top shadow-sm" id="contact">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <img src="{{ asset('logo.png') }}" alt="Logo Footer" width="120" class="mb-3">
                    <p class="text-muted small pe-md-4">
                        Solusi perawatan kecantikan terpercaya di Tangerang. Kami menghadirkan teknologi modern dan tim profesional untuk mewujudkan kulit sehat dan bercahaya impian Anda.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="text-gold me-3 fs-5"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gold me-3 fs-5"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gold me-3 fs-5"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" class="text-gold fs-5"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="fw-bold mb-4" style="color: var(--gold-main);">Layanan</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="/" class="text-muted text-decoration-none hover-gold">Home</a></li>
                        <li class="mb-2"><a href="/reservasi" class="text-muted text-decoration-none hover-gold">Reservasi</a></li>
                        <li class="mb-2"><a href="/riwayat" class="text-muted text-decoration-none hover-gold">Riwayat</a></li>
                        <li class="mb-2"><a href="/profil" class="text-muted text-decoration-none hover-gold">Profil Saya</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="fw-bold mb-4" style="color: var(--gold-main);">Jam Buka</h6>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2 d-flex justify-content-between"><span>Senin - Sabtu</span> <span>09:00 - 20:00</span></li>
                        <li class="mb-2 d-flex justify-content-between"><span>Minggu</span> <span>10:00 - 17:00</span></li>
                        <li class="mb-0 mt-3 text-gold italic fw-bold">Libur Nasional Tutup</li>
                    </ul>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 small">
                    <h6 class="fw-bold mb-4" style="color: var(--gold-main);">Hubungi Kami</h6>
                    <p class="text-muted"><i class="fas fa-location-dot text-gold me-2"></i> Jl. Raya Tangerang No. 123, Banten</p>
                    <p class="text-muted"><i class="fas fa-envelope text-gold me-2"></i> info@jglowclinic.com</p>
                    <p class="text-muted"><i class="fas fa-phone text-gold me-2"></i> +62 812-3456-7890</p>
                </div>
            </div>
        </div>

        <div class="container border-top pt-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-muted small mb-0">&copy; 2026 <strong>JGlow Clinic</strong>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                    <p class="text-muted small mb-0 italic">Developed by Rafli Irvansyah - 2255201146</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    // Ini yang bikin animasinya jalan halus
                    window.scrollTo({
                        top: targetElement.offsetTop - 90, // -90 supaya gak ketutupan Navbar yang melayang
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>
