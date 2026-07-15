<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use App\Models\PeriodeMagang;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = PendaftaranMagang::count();

        $belumValid = PendaftaranMagang::where('status', 'menunggu')->count();

        $sudahValid = PendaftaranMagang::whereIn('status', ['diterima','ditolak'])->count();

        $periodeAktif = PeriodeMagang::where('status','aktif')->first();

        $aktivitas = PendaftaranMagang::with('user')
                        ->latest()
                        ->take(5)
                        ->get();

        return view('operator.dashboard', compact(
            'totalMahasiswa',
            'belumValid',
            'sudahValid',
            'periodeAktif',
            'aktivitas'
        ));
    }
}
