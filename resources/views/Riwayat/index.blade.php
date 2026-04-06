<x-app-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h2 class="fw-bold mb-1" style="color: #a38944; font-family: 'serif'; font-style: italic;">Riwayat Reservasi</h2>
                <p class="text-muted small">Pantau jadwal perawatan kecantikan Anda di JGlow Clinic Tangerang</p>
            </div>
            <a href="{{ route('reservasi.index') }}" class="btn btn-gold text-white rounded-pill px-4 shadow-sm">
                <i class="fas fa-plus me-2"></i>Booking Baru
            </a>
        </div>

        <div class="d-flex flex-column gap-3">
            @forelse($riwayats as $item)
                <div class="card border-0 shadow-sm rounded-4 position-relative overflow-hidden">
                    <div class="card-body p-4">
                        <div class="row align-items-center text-center text-md-start">

                            <div class="col-md-2 mb-3 mb-md-0">
                                @php
                                    $statusColor = [
                                        'pending' => 'bg-warning text-dark',
                                        'confirmed' => 'bg-primary text-white',
                                        'check_in' => 'bg-info text-white',
                                        'checkout' => 'bg-success text-white',
                                        'cancelled' => 'bg-danger text-white'
                                    ];
                                    $label = $item->status == 'confirmed' ? 'TERJADWAL' : ($item->status == 'checkout' ? 'SELESAI' : strtoupper($item->status));
                                @endphp
                                <span class="badge {{ $statusColor[$item->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill w-100" style="font-size: 0.75rem;">
                                    {{ $label }}
                                </span>
                            </div>

                            <div class="col-md-2 col-6 mb-2 mb-md-0">
                                <label class="d-block small text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Tanggal</label>
                                <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($item->tgl_reservasi)->translatedFormat('l, d F Y') }}</span>
                            </div>

                            <div class="col-md-2 col-6 mb-2 mb-md-0 border-start-md">
                                <label class="d-block small text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Jam</label>
                                <span class="fw-bold text-dark">{{ $item->jam_reservasi }} WIB</span>
                            </div>

                            <div class="col-md-2 mb-2 mb-md-0 border-start-md">
                                <label class="d-block small text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Keluhan</label>
                                <span class="fw-bold text-gold text-truncate d-block">{{ $item->keluhan ?? 'Konsultasi Umum' }}</span>
                            </div>

                            <div class="col-md-2 mb-3 mb-md-0 border-start-md">
                                <label class="d-block small text-muted fw-bold text-uppercase" style="font-size: 0.65rem;">Dokter</label>
                                <span class="text-dark italic small">Dr. {{ $item->dokter->name }}</span>
                            </div>

                            <div class="col-md-2 d-flex gap-2 justify-content-center">
                                <a href="#" class="btn btn-sm btn-gold-outline rounded-3 flex-fill">
                                    <i class="fas fa-file-pdf me-1"></i> Cetak
                                </a>
                                <button type="button" class="btn btn-sm btn-gold-outline rounded-3 flex-fill" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                    <i class="fas fa-eye me-1"></i> Detail
                                </button>
                                @if($item->status == 'pending')
                                    <form action="{{ route('reservasi.cancel', $item->id) }}" method="POST" class="flex-fill d-flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-3 flex-fill btn-cancel">
                                            <i class="fas fa-times me-1"></i> Cancel
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 rounded-4 shadow-lg">
                            <div class="modal-header border-0 pb-0">
                                <h5 class="modal-title fw-bold text-gold"><i class="fas fa-info-circle me-2"></i>Detail Reservasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="text-center mb-4">
                                    <div class="badge {{ $statusColor[$item->status] ?? 'bg-secondary' }} mb-2 px-3 py-2 rounded-pill">
                                        {{ $label }}
                                    </div>
                                    <h4 class="fw-bold mb-0">#RES-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</h4>
                                </div>

                                <div class="list-group list-group-flush rounded-3 border">
                                    <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <span class="text-muted small">Nama Pasien</span>
                                        <span class="fw-bold small">{{ Auth::user()->name }}</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <span class="text-muted small">Dokter</span>
                                        <span class="fw-bold small text-end">Dr. {{ $item->dokter->name }}</span>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center py-3">
                                        <span class="text-muted small">Waktu Kunjungan</span>
                                        <span class="fw-bold small text-end">
                                            {{ \Carbon\Carbon::parse($item->tgl_reservasi)->format('d M Y') }}<br>
                                            <span class="text-gold">{{ $item->jam_reservasi }} WIB</span>
                                        </span>
                                    </div>
                                    <div class="list-group-item py-3">
                                        <span class="text-muted d-block small mb-2">Keluhan / Catatan:</span>
                                        <div class="p-3 bg-light rounded-3 small italic text-secondary border-start border-4 border-gold">
                                            "{{ $item->keluhan ?? 'Tidak ada keluhan tambahan.' }}"
                                        </div>
                                    </div>
                                    @if($item->status == 'cancelled' && $item->alasan_tolak)
                                        <div class="list-group-item py-3 bg-danger bg-opacity-10">
                                            <span class="text-danger d-block small mb-2 fw-bold"><i class="fas fa-comment-dots me-1"></i> Catatan Dokter (Alasan Pembatalan):</span>
                                            <div class="p-3 bg-white rounded-3 small italic text-danger border border-danger border-opacity-25">
                                                "{{ $item->alasan_tolak }}"
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-4 alert alert-warning border-0 rounded-4 small d-flex align-items-start">
                                    <i class="fas fa-exclamation-circle me-2 mt-1"></i>
                                    <span>Mohon tunjukkan bukti reservasi ini kepada admin saat tiba di JGlow Clinic Tangerang.</span>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0">
                                <button type="button" class="btn btn-light rounded-pill px-4 fw-bold" data-bs-dismiss="modal">Tutup</button>
                                @if($item->status == 'pending')
                                    <button type="button" class="btn btn-danger rounded-pill px-4 fw-bold shadow-sm">Batalkan</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="card border-0 shadow-sm rounded-4 p-5 text-center">
                    <img src="https://illustrations.popsy.co/amber/calendar.svg" style="width: 180px;" class="mx-auto mb-4" alt="Empty">
                    <h5 class="fw-bold text-dark">Belum Ada Riwayat</h5>
                    <p class="text-muted small">Anda belum melakukan reservasi perawatan kecantikan apapun.</p>
                    <div class="mt-2">
                        <a href="{{ route('reservasi.index') }}" class="btn btn-gold text-white rounded-pill px-4">Booking Sekarang</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .text-gold { color: #a38944; }
        .border-gold { border-color: #a38944 !important; }
        .btn-gold { background-color: #a38944; border-color: #a38944; transition: 0.3s; }
        .btn-gold:hover { background-color: #8b7336; border-color: #8b7336; transform: translateY(-2px); }
        .btn-gold-outline { border: 1px solid #a38944; color: #a38944; transition: 0.2s; }
        .btn-gold-outline:hover { background-color: #fcf9f2; color: #8b7336; }

        @media (min-width: 768px) {
            .border-start-md { border-left: 1px solid #eee; padding-left: 20px; }
        }

        .card { transition: all 0.3s ease; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important; }
        .italic { font-style: italic; }
    </style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000,
                borderRadius: '15px'
            });
        </script>
    @endif

    <script>
        document.querySelectorAll('.btn-cancel').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Batalkan Reservasi?',
                    text: "Jadwal yang dibatalkan tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#a38944',
                    confirmButtonText: 'Ya, Batalkan!',
                    cancelButtonText: 'Kembali'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
