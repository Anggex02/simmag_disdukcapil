<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PeriodeMagang;
use App\Models\PendaftaranMagang;

class DashboardController extends Controller
{
    public function index()
{
    $totalOperator = User::where('role', 'operator')->count();

    $totalMahasiswa = User::where('role', 'mahasiswa')->count();

    $totalMentor = User::where('role', 'mentor')->count();

    $totalPeriode = PeriodeMagang::count();

    $totalPendaftaran = PendaftaranMagang::count();

    return view('superadmin.dashboard', compact(
        'totalOperator',
        'totalMahasiswa',
        'totalMentor',
        'totalPeriode',
    ));
}
}