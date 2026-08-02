<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Mentor;

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

      $mentor = Mentor::where('user_id', auth()->id())->firstOrFail();

$mahasiswas = Mahasiswa::with('user')
    ->where('mentor_id', $mentor->id)
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