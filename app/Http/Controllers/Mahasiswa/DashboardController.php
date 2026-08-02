<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use App\Models\PeriodeMagang;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Logbook;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pendaftaran = PendaftaranMagang::with('periodeMagang')
            ->where('user_id', $user->id)
            ->latest()
            ->first();
        $mahasiswa = Mahasiswa::with('mentor')
            ->where('user_id', $user->id)
            ->first();

        $jumlahLogbook = 0;

        if ($mahasiswa) {
            $jumlahLogbook = Logbook::where('mahasiswa_id', $mahasiswa->id)->count();
        }


        return view('mahasiswa.dashboard', [

            'lowongan' => PeriodeMagang::where('status', 'aktif')->count(),

            'lamaran' => PendaftaranMagang::where('user_id', $user->id)->count(),

            'pendaftaran' => $pendaftaran,

            'mahasiswa' => $mahasiswa, // <- WAJIB ADA

            'jumlahLogbook' => $jumlahLogbook,

        ]);
    }
}