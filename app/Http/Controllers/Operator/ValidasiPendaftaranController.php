<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class ValidasiPendaftaranController extends Controller
{
    /**
     * Menampilkan seluruh pendaftaran magang
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pendaftaran = PendaftaranMagang::with('user')
            ->when($search, function ($query) use ($search) {

                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('universitas', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {

                        $q->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");

                    });

            })
            ->latest()
            ->get();

        return view('operator.validasi', compact('pendaftaran'));
    }

    /**
     * Menampilkan detail pendaftaran
     */
    public function show($id)
    {
        $pendaftaran = PendaftaranMagang::with('user')->findOrFail($id);

        return view('operator.detail-validasi', compact('pendaftaran'));
    }

    /**
     * Menerima pendaftaran
     */
    public function terima($id)
    {
        $pendaftaran = PendaftaranMagang::findOrFail($id);

        // Update status pendaftaran
        $pendaftaran->update([
            'status' => 'diterima'
        ]);

        // Cek apakah mahasiswa sudah ada
        $cek = Mahasiswa::where('user_id', $pendaftaran->user_id)->first();

        if (!$cek) {

            Mahasiswa::create([
                'user_id' => $pendaftaran->user_id,
                'mentor_id' => $pendaftaran->mentor_id,
                'periode_magang_id' => $pendaftaran->periode_magang_id,
                'nim' => $pendaftaran->nim,
                'universitas' => $pendaftaran->universitas,
                'jurusan' => $pendaftaran->program_studi,
                'no_hp' => $pendaftaran->no_hp,
                'alamat' => $pendaftaran->alamat,
                'status' => 'aktif',
            ]);

        }

        return back()->with('success', 'Mahasiswa berhasil diterima.');
    }
    /**
     * Menolak pendaftaran
     */
    public function tolak($id)
    {
        $pendaftaran = PendaftaranMagang::findOrFail($id);

        $pendaftaran->update([
            'status' => 'ditolak'
        ]);

        return redirect()
            ->route('operator.validasi')
            ->with('success', 'Mahasiswa berhasil ditolak.');
    }
}