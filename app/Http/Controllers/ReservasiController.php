<?php

namespace App\Http\Controllers;

use App\Models\DataReservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function index()
    {
        $dokters = \App\Models\User::role('Dokter')->get();

        return view('reservasi.index', compact('dokters'));
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Dasar
        $request->validate([
            'dokter_id' => 'required',
            'tgl_reservasi' => 'required|date',
            'jam_reservasi' => 'required',
        ]);

        $cekAdaGak = DataReservasi::where('dokter_id', $request->dokter_id)
            ->where('tgl_reservasi', $request->tgl_reservasi)
            ->where('jam_reservasi', $request->jam_reservasi)
            ->whereIn('status', ['pending', 'confirmed']) // Tambahin ini juga di fungsi store
            ->exists();

        if ($cekAdaGak) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Jam ini sudah dibooking oleh pasien lain. Mohon pilih jam atau tanggal lain ya!');
        }

        DataReservasi::create([
            'pasien_id' => Auth::id(),
            'dokter_id' => $request->dokter_id,
            'tgl_reservasi' => $request->tgl_reservasi,
            'jam_reservasi' => $request->jam_reservasi,
            'keluhan' => $request->keluhan,
            'status' => 'pending',
        ]);

        return redirect()->route('riwayat')->with('success', 'Reservasi berhasil dikirim!');
    }

    public function riwayat()
    {
        // Ambil data reservasi milik user yang sedang login (sebagai pasien)
        $riwayats = \App\Models\DataReservasi::with('dokter')
            ->where('pasien_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('riwayat.index', compact('riwayats'));
    }

    public function cancel($id)
    {
        $reservasi = \App\Models\DataReservasi::where('id', $id)
            ->where('pasien_id', Auth::id()) // Keamanan: Pastikan milik user yang login
            ->firstOrFail();

        $reservasi->delete();

        return redirect()->back()->with('success', 'Reservasi berhasil dibatalkan.');
    }

    // Fungsi untuk Approve (Simpel)
    public function approve($id)
    {
        $reservasi = \App\Models\DataReservasi::findOrFail($id);
        $reservasi->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Reservasi berhasil disetujui!');
    }

    // Fungsi untuk Cancel/Reject dengan Alasan
    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_tolak' => 'required|string|min:5'
        ]);

        $reservasi = \App\Models\DataReservasi::findOrFail($id);
        $reservasi->update([
            'status' => 'cancelled',
            'alasan_tolak' => $request->alasan_tolak
        ]);

        return redirect()->back()->with('success', 'Reservasi telah ditolak.');
    }

    public function cekJadwal(Request $request)
    {
        $bookedHours = DataReservasi::where('dokter_id', $request->dokter_id)
            ->where('tgl_reservasi', $request->tgl_reservasi)
            ->whereIn('status', ['pending', 'confirmed']) // KUNCINYA DI SINI BANG
            ->pluck('jam_reservasi')
            ->toArray();

        return response()->json($bookedHours);
    }
}
