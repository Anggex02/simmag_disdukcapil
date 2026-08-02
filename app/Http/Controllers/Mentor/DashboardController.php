<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Logbook;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mentor = Mentor::where('user_id', Auth::id())->firstOrFail();

        $jumlahMahasiswa = Mahasiswa::where('mentor_id', $mentor->id)->count();

        $menungguValidasi = Logbook::whereHas('mahasiswa', function ($query) use ($mentor) {
            $query->where('mentor_id', $mentor->id);
        })->where('status', 'menunggu')->count();

        $logbookDisetujui = Logbook::whereHas('mahasiswa', function ($query) use ($mentor) {
            $query->where('mentor_id', $mentor->id);
        })->where('status', 'disetujui')->count();

        return view('mentor.dashboard', compact(
            'jumlahMahasiswa',
            'menungguValidasi',
            'logbookDisetujui'
        ));
    }
}