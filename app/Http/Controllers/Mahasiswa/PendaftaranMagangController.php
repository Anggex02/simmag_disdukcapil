<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranMagangController extends Controller
{
    /**
     * Menampilkan form pendaftaran
     */
    public function index()
    {
        // Ambil semua periode yang aktif
        $periodes = PeriodeMagang::where('status', 'aktif')
            ->orderBy('tanggal_mulai')
            ->get();

        $pendaftaran = PendaftaranMagang::where('user_id', Auth::id())->first();

        return view(
            'mahasiswa.pendaftaran-magang.index',
            compact('periodes', 'pendaftaran')
        );
    }

    /**
     * Simpan pendaftaran
     */
    public function store(Request $request)
    {
        $cek = PendaftaranMagang::where('user_id', Auth::id())->first();

        if ($cek) {
            return back()->with(
                'error',
                'Anda sudah pernah mengajukan pendaftaran magang.'
            );
        }

        $request->validate([
            'periode_magang_id' => 'required|exists:periode_magangs,id',
            'nim' => 'required|max:20',
            'universitas' => 'required|max:150',
            'program_studi' => 'required|max:100',
            'semester' => 'required|integer|min:1|max:14',
            'no_hp' => 'required|max:20',
            'alamat' => 'required',
            'cv' => 'required|mimes:pdf|max:2048',
            'surat_pengantar' => 'required|mimes:pdf|max:2048',
        ]);

        $cv = $request->file('cv')->store('cv', 'public');

        $surat = $request->file('surat_pengantar')->store('surat_pengantar', 'public');

        PendaftaranMagang::create([
            'user_id' => Auth::id(),
            'periode_magang_id' => $request->periode_magang_id,
            'nim' => $request->nim,
            'universitas' => $request->universitas,
            'program_studi' => $request->program_studi,
            'semester' => $request->semester,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'cv' => $cv,
            'surat_pengantar' => $surat,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('mahasiswa.dashboard')
            ->with('success', 'Pendaftaran magang berhasil dikirim.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}