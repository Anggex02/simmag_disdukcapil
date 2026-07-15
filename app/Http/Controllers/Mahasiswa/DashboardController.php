<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use App\Models\PeriodeMagang;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $pendaftaran = PendaftaranMagang::with('periodeMagang')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        return view('mahasiswa.dashboard', [

            'lowongan' => PeriodeMagang::where('status', 'aktif')->count(),

            'lamaran' => PendaftaranMagang::where('user_id', $user->id)->count(),

            'pendaftaran' => $pendaftaran

        ]);
    }
}