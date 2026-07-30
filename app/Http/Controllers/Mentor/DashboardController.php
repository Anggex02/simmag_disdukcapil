<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Logbook;

class DashboardController extends Controller
{
    public function index()
    {
        // SEMENTARA
        $mentorId = 1;

        $jumlahMahasiswa = Mahasiswa::where('mentor_id', $mentorId)->count();

        $menungguValidasi = Logbook::whereHas('mahasiswa', function ($query) use ($mentorId) {
            $query->where('mentor_id', $mentorId);
        })->where('status', 'menunggu')->count();

        $logbookDisetujui = Logbook::whereHas('mahasiswa', function ($query) use ($mentorId) {
            $query->where('mentor_id', $mentorId);
        })->where('status', 'disetujui')->count();

        return view('mentor.dashboard', compact(
            'jumlahMahasiswa',
            'menungguValidasi',
            'logbookDisetujui'
        ));
    }
}