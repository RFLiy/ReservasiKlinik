<x-app-layout>
    <div class="container-fluid py-4">
        <h2 class="text-center fw-bold mb-4" style="color: #a38944; font-family: 'serif'; font-style: italic;">
            WEBSITE RESERVASI JGLOW CLINIC TANGERANG
        </h2>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0">
                <div class="col-12 bg-secondary text-white p-3 text-center fw-bold">
                    <i class="fas fa-clipboard-list me-2"></i> Form Reservasi Pasien
                </div>
            </div>

            <div class="card-body p-4 bg-light">
                <form action="{{ route('reservasi.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4 p-3 rounded-4 bg-white shadow-sm border">
                        <div class="col-12 mb-3 border-bottom pb-2">
                            <h5 class="fw-bold text-gold"><i class="fas fa-user-circle me-2"></i>Informasi Pasien</h5>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Nama Lengkap</label>
                            <input type="text" class="form-control rounded-pill bg-light border-0 py-2"
                                value="{{ Auth::user()->name }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Nomor WhatsApp</label>
                            <input type="text" class="form-control rounded-pill bg-light border-0 py-2"
                                value="{{ Auth::user()->no_tlp }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Jenis Kelamin</label>
                            <input type="text" class="form-control rounded-pill bg-light border-0 py-2"
                                value="{{ Auth::user()->jenis_kelamin }}" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="small fw-bold text-muted">Alamat Domisili</label>
                            <input type="text" class="form-control rounded-pill bg-light border-0 py-2"
                                value="{{ Auth::user()->address }}" readonly>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-12 mb-2">
                            <h5 class="fw-bold text-gold"><i class="fas fa-calendar-plus me-2"></i>Detail Kunjungan</h5>
                        </div>

                        @if(session('error'))
                        <div class="col-12">
                            <div class="alert alert-danger border-0 shadow-sm rounded-4">
                                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                            </div>
                        </div>
                        @endif

                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Pilih Dokter</label>
                            <select name="dokter_id" id="dokter_id" class="form-select rounded-pill border-secondary py-2" required>
                                <option selected disabled value="">-- Pilih Dokter Spesialis --</option>
                                @foreach($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">Dr. {{ $dokter->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Tanggal Kedatangan</label>
                            <input type="date" name="tgl_reservasi" id="tgl_reservasi" class="form-control rounded-pill border-secondary py-2"
                                min="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold small">Pilih Jam Kedatangan</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-secondary rounded-start-pill border-end-0">
                                    <i class="fas fa-clock text-gold"></i>
                                </span>
                                <select name="jam_reservasi" id="jam_reservasi" class="form-select rounded-end-pill border-secondary border-start-0 py-2 shadow-none" style="cursor: pointer;" required disabled>
                                    <option selected disabled value="">-- Pilih Dokter & Tanggal Dulu --</option>
                                    @php
                                        $jam_list = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
                                    @endphp
                                    @foreach($jam_list as $jam)
                                        <option value="{{ $jam }}">{{ $jam }} WIB</option>
                                    @endforeach
                                </select>
                            </div>
                            <small class="text-muted ms-3 mt-1 d-block"><i class="fas fa-info-circle me-1"></i>Pilih waktu yang tersedia</small>
                        </div>

                        <div class="col-12 mt-4">
                            <label class="form-label fw-bold small">Keluhan atau Catatan Tambahan</label>
                            <textarea name="keluhan" class="form-control rounded-4" rows="3" placeholder="Tuliskan keluhan Anda di sini..."></textarea>
                        </div>

                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-gold text-white fw-bold px-5 py-2 rounded-pill shadow-sm">
                                Konfirmasi & Kirim Reservasi
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .text-gold { color: #a38944; }
        .btn-gold { background-color: #a38944; border: none; }
        .btn-gold:hover { background-color: #8b7336; transform: translateY(-2px); transition: 0.3s; }
        .bg-light { background-color: #f8f9fa !important; }
        select:disabled { background-color: #e9ecef !important; cursor: not-allowed !important; }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchBookedHours() {
                let dokterId = $('#dokter_id').val();
                let tanggal = $('#tgl_reservasi').val();
                let jamSelect = $('#jam_reservasi');

                // Jika Dokter DAN Tanggal sudah terisi
                if (dokterId && tanggal) {
                    $.ajax({
                        url: "{{ route('cek.jadwal') }}",
                        type: "GET",
                        data: {
                            dokter_id: dokterId,
                            tgl_reservasi: tanggal
                        },
                        success: function(bookedHours) {
                            // 1. Buka Kunci Select Jam
                            jamSelect.prop('disabled', false);
                            jamSelect.find('option[value=""]').text("-- Pilih Jam Kedatangan --");

                            // 2. Reset Status Semua Jam ke Normal (Hitam & Bisa Klik)
                            jamSelect.find('option').each(function() {
                                if ($(this).val() !== "") {
                                    $(this).prop('disabled', false).css('color', '#000').text($(this).val() + " WIB");
                                }
                            });

                            // 3. Tandai Jam yang SUDAH DIPESAN (Abu-abu & Gak Bisa Klik)
                            jamSelect.find('option').each(function() {
                                let jamVal = $(this).val();
                                if (bookedHours.includes(jamVal)) {
                                    $(this).prop('disabled', true).css('color', '#ccc').text(jamVal + " WIB (Sudah Dipesan)");
                                }
                            });

                            // 4. Reset pilihan jam jika yang dipilih sebelumnya ternyata penuh setelah ganti tgl/dokter
                            if (bookedHours.includes(jamSelect.val())) {
                                jamSelect.val("");
                            }
                        },
                        error: function() {
                            console.log("Error: Gagal mengambil data jadwal.");
                        }
                    });
                } else {
                    // Jika data belum lengkap, kunci kembali select jam
                    jamSelect.prop('disabled', true);
                    jamSelect.val("");
                    jamSelect.find('option[value=""]').text("-- Pilih Dokter & Tanggal Dulu --");
                }
            }

            // Jalankan fungsi tiap kali dropdown Dokter atau input Tanggal berubah
            $('#dokter_id, #tgl_reservasi').on('change', function() {
                fetchBookedHours();
            });
        });
    </script>
</x-app-layout>
