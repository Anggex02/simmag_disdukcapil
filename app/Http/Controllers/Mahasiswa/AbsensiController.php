<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $absensis = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->latest()
            ->get();

        return view('mahasiswa.absensi.index', compact(
            'mahasiswa',
            'absensis'
        ));
    }

    public function absenMasuk()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $cek = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('tanggal', today())
            ->first();

        if ($cek) {
            return back()->with('error', 'Hari ini sudah melakukan absen masuk.');
        }

        Absensi::create([
            'mahasiswa_id' => $mahasiswa->id,
            'tanggal'      => today(),
            'jam_masuk'    => now()->format('H:i:s'),
            'status'       => 'hadir'
        ]);

        return back()->with('success', 'Absen masuk berhasil.');
    }

    public function absenPulang()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $absensi = Absensi::where('mahasiswa_id', $mahasiswa->id)
            ->whereDate('tanggal', today())
            ->first();

        if (!$absensi) {
            return back()->with('error', 'Silakan absen masuk terlebih dahulu.');
        }

        $absensi->update([
            'jam_keluar' => now()->format('H:i:s')
        ]);

        return back()->with('success', 'Absen pulang berhasil.');
    }
}