<x-app-layout>
    <br id="home">
    <div class="container-fluid">
        <div class="row rounded-4 overflow-hidden mb-5 shadow-sm" style="background: linear-gradient(to right, #7d6b3d, #c5ae73); color: white;">
            <div class="col-md-7 p-5 d-flex flex-column justify-content-center">
                <h1 class="display-5 fw-bold mb-3">Wujudkan Kecantikan Impian Anda</h1>
                <p class="lead mb-4">JGLOW CLINIC hadir dengan teknologi terdepan untuk mewujudkan kecantikan alami Anda.</p>
                @auth
                    <a href="/reservasi" class="btn-reservasi">Reservasi Sekarang</a>
                @else
                    <a href="{{ route('login') }}" class="btn-reservasi">Login untuk Reservasi</a>
                @endauth
            </div>
            <div class="col-md-5 p-0 d-none d-md-block">
                <img src="{{ asset('bener.jpg') }}" class="img-fluid h-100 object-fit-cover" alt="Banner">
            </div>
        </div>

        <section class="py-5 position-relative rounded-md overflow-hidden">
            <div class="position-absolute top-0 end-0 p-5 opacity-10 d-none d-lg-block">
                <i class="fas fa-spa fa-10x text-gold"></i>
            </div>

            <div class="container text-center py-5">
                <div class="mb-5">
                    <h6 class="text-uppercase fw-bold ls-2 mb-2" style="color: #a38944; letter-spacing: 3px; font-size: 0.8rem;">Keunggulan Kami</h6>
                    <h2 class="fw-bold display-6" style="color: #333; font-family: 'serif';">Kenapa Memilih <span style="color: #a38944; font-style: italic;">JGlow Clinic?</span></h2>
                    <div class="mx-auto mt-3" style="width: 60px; height: 3px; background: #a38944; border-radius: 5px;"></div>
                </div>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="card p-5 h-100 feature-card shadow-sm rounded-4 position-relative border-bottom border-4 border-transparent">
                            <div class="icon-box mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fas fa-user-md fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Dokter Spesialis</h5>
                            <p class="text-muted small px-2">Ditangani oleh tenaga medis profesional yang tersertifikasi secara internasional di bidang dermatologi.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-5 h-100 feature-card shadow-sm rounded-4 position-relative border-bottom border-4 border-transparent">
                            <div class="icon-box mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fas fa-magic fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Teknologi Terkini</h5>
                            <p class="text-muted small px-2">Alat medis standar global untuk menjamin keamanan dan hasil yang presisi pada setiap treatment.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-5 h-100 feature-card shadow-sm rounded-4 position-relative border-bottom border-4 border-transparent">
                            <div class="icon-box mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm">
                                <i class="fas fa-heart fa-2x"></i>
                            </div>
                            <h5 class="fw-bold mb-3">Pelayanan Premium</h5>
                            <p class="text-muted small px-2">Kenyamanan eksklusif dan konsultasi mendalam menjadi standar prioritas kami untuk Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <h2 class="fw-bold" style="color: #a38944;">Layanan Best Seller</h2>
                    <div class="mx-auto" style="width: 60px; height: 3px; background: #a38944;"></div>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm overflow-hidden service-card">
                            <img src="{{ asset('lay.jpg') }}" class="card-img-top" alt="Facial Glow">
                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold">Glow Up Facial</h5>
                                <p class="text-muted small">Treatment pembersihan wajah mendalam untuk kulit tampak cerah seketika.</p>
                                <a href="/reservasi" class="btn btn-outline-gold btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm overflow-hidden service-card">
                            <img src="{{ asset('lay2.jpg') }}" class="card-img-top" alt="Facial Glow">
                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold">Glow Up Facial</h5>
                                <p class="text-muted small">Treatment pembersihan wajah mendalam untuk kulit tampak cerah seketika.</p>
                                <a href="/reservasi" class="btn btn-outline-gold btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm overflow-hidden service-card">
                            <img src="{{ asset('lay3.jpg') }}" class="card-img-top" alt="Facial Glow">
                            <div class="card-body text-center p-4">
                                <h5 class="fw-bold">Glow Up Facial</h5>
                                <p class="text-muted small">Treatment pembersihan wajah mendalam untuk kulit tampak cerah seketika.</p>
                                <a href="/reservasi" class="btn btn-outline-gold btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center mb-4">
            <h2 class="fw-bold" style="color: #444;">Dokter Spesialis Kami</h2>
            <hr class="mx-auto" style="width: 50px; border: 2px solid #a38944; opacity: 1;">
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3 rounded-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('doc.jpg') }}" class="rounded-3 me-3" width="100" height="120" style="object-fit: cover;">
                        <div>
                            <h5 class="fw-bold mb-1">Dr. Dian Muthia, Sp.KK</h5>
                            <small class="text-muted d-block">Senin - Selasa: 08.00 AM - 12.00 PM</small>
                            <small class="text-muted d-block">Jumat: 12.00 - 17.00</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3 rounded-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('doc2.jpg') }}" class="rounded-3 me-3" width="100" height="120" style="object-fit: cover;">
                        <div>
                            <h5 class="fw-bold mb-1">Dr. Welis Dita, Sp.DV</h5>
                            <small class="text-muted d-block">Rabu - Kamis: 09.00 AM - 02.00 PM</small>
                            <small class="text-muted d-block">Sabtu: 02.00 PM - 03.00 PM</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row g-4 mt-2 mb-5">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3 rounded-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('doc3.png') }}" class="rounded-3 me-3" width="100" height="120" style="object-fit: cover;">
                        <div>
                            <h5 class="fw-bold mb-1">Dr. Dian Muthia, Sp.KK</h5>
                            <small class="text-muted d-block">Senin - Selasa: 03.00 PM - 17.00 PM</small>
                            <small class="text-muted d-block">Jumat: 10.00 AM - 01.00 PM</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-3 rounded-4">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('doc4.jpg') }}" class="rounded-3 me-3" width="100" height="120" style="object-fit: cover;">
                        <div>
                            <h5 class="fw-bold mb-1">Dr. Welis Dita, Sp.DV</h5>
                            <small class="text-muted d-block">Rabu - Kamis: 09.00 AM - 11.00 AM</small>
                            <small class="text-muted d-block">Sabtu: 10.00 AM - 15.00 PM</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-5 bg-white border-top overflow-hidden" id="services">
            <div class="container py-5">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="pe-lg-4">
                            <h6 class="text-uppercase fw-bold ls-2 mb-3" style="color: #a38944; letter-spacing: 2px; font-size: 0.85rem;">Transformasi Nyata</h6>
                            <h2 class="fw-bold display-5 mb-4" style="color: #333; font-family: 'serif';">Lihat <span style="color: #a38944; font-style: italic;">Perubahannya</span></h2>
                            <p class="text-muted mb-4 fs-5">Hasil nyata dari ribuan pasien kami yang telah membuktikan keefektifan treatment di <span class="fw-bold" style="color: #a38944;">JGlow Clinic</span>. Kulit lebih bersih, cerah, dan bebas dari masalah jerawat.</p>

                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center p-3 rounded-4 border bg-light shadow-sm transition-hover">
                                        <i class="fas fa-check-circle text-gold me-3 fs-4"></i>
                                        <span class="small fw-bold">Jerawat Berkurang</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center p-3 rounded-4 border bg-light shadow-sm transition-hover">
                                        <i class="fas fa-check-circle text-gold me-3 fs-4"></i>
                                        <span class="small fw-bold">Tekstur Lebih Halus</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center p-3 rounded-4 border bg-light shadow-sm transition-hover">
                                        <i class="fas fa-check-circle text-gold me-3 fs-4"></i>
                                        <span class="small fw-bold">Flek Hitam Pudar</span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center p-3 rounded-4 border bg-light shadow-sm transition-hover">
                                        <i class="fas fa-check-circle text-gold me-3 fs-4"></i>
                                        <span class="small fw-bold">Kulit Lebih Cerah</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="position-relative">
                            <div class="position-absolute translate-middle top-50 start-50 w-100 h-100 bg-gold opacity-10 rounded-circle d-none d-md-block" style="filter: blur(80px);"></div>

                            <div class="card border-0 rounded-5 shadow-lg overflow-hidden p-2 bg-white transform-up">
                                <div class="position-relative">
                                    <img src="{{ asset('bfaf.png') }}" class="w-100 rounded-5" alt="Hasil Treatment" style="object-fit: cover; min-height: 400px;">

                                    <div class="position-absolute bottom-0 start-0 w-100 p-4 bg-gradient-dark">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="badge bg-white text-gold px-4 py-2 rounded-pill shadow fw-bold">
                                                Hasil 4x Treatment
                                            </div>
                                            <div class="text-white small italic">
                                                *Hasil dapat berbeda tiap pasien
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5" style="background-color: #fcfaf5;">
            <div class="container py-4">
                <div class="text-center mb-5">
                    <h2 class="fw-bold" style="color: #a38944; font-family: 'Poppins', serif;">Kata Mereka Tentang Jglow Clinic</h2>
                    <div class="mx-auto" style="width: 80px; height: 3px; background: #a38944; border-radius: 2px;"></div>
                    <p class="text-muted mt-3">Ribuan pasien telah membuktikan kualitas layanan dan hasil treatment kami.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 review-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-gold-light text-white d-flex align-items-center justify-content-center fw-bold me-3" style="width: 50px; height: 50px; font-size: 20px;">
                                    S
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Siti Rahma</h6>
                                    <small class="text-muted">Pasien Jglow Tangerang</small>
                                </div>
                            </div>

                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <p class="card-text text-muted small italic">"Awalnya ragu karena kulit sensitif, tapi dokter di Jglow Clinic sabar banget jelasinnya. Alatnya steril dan modern. Setelah 3x treatment Glow Up Facial, wajah jadi jauh lebih cerah dan sehat. Suka banget!"</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 review-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-gold-light text-white d-flex align-items-center justify-content-center fw-bold me-3" style="width: 50px; height: 50px; font-size: 20px;">
                                    R
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Rian Ardiansyah</h6>
                                    <small class="text-muted">Pasien Acne Care</small>
                                </div>
                            </div>
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text text-muted small italic">"Sebagai cowok awalnya malu mau ke klinik, tapi ternyata di Jglow super nyaman. Treatment Laser Rejuve-nya gak sakit sama sekali dan pori-pori jadi lebih halus. Mantap!"</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 p-4 review-card">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-gold-light text-white d-flex align-items-center justify-content-center fw-bold me-3" style="width: 50px; height: 50px; font-size: 20px;">
                                    D
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-0">Dewi Sartika</h6>
                                    <small class="text-muted">Pasien Anti-Aging</small>
                                </div>
                            </div>
                            <div class="text-warning mb-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text text-muted small italic">"Pelayanan ramah dari resepsionis sampai dokter. Tempatnya bersih dan wangi. Hasil dari treatment HIFU-nya langsung kelihatan di wajah aku, jadi lebih tirus dan kencang."</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
