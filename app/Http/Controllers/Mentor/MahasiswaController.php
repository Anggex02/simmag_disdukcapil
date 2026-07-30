<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Daftar mahasiswa bimbingan
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Sementara tampilkan semua mahasiswa.
        | Nanti jika tabel mentors sudah terisi,
        | tinggal tambahkan where('mentor_id', ...)
        |--------------------------------------------------------------------------
        */

        $mahasiswas = Mahasiswa::with([
            'user',
            'mentor',
            'periodeMagang'
        ])
        ->latest()
        ->get();

        return view('mentor.mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Detail mahasiswa
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with([
            'user',
            'mentor',
            'periodeMagang',
            'logbooks'
        ])
        ->withCount('logbooks')
        ->findOrFail($id);

        return view('mentor.mahasiswa.detail', compact('mahasiswa'));
    }
}