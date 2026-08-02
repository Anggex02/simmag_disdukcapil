<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Mentor;

class AbsensiController extends Controller
{
    public function index()
    {
        $mentor = Mentor::where('user_id', auth()->id())->firstOrFail();

        $mahasiswas = Mahasiswa::with('user')
            ->withCount('absensis')
            ->where('mentor_id', $mentor->id)
            ->latest()
            ->get();

        return view(
            'mentor.absensi.index',
            compact('mahasiswas')
        );
    }

    public function detail($id)
    {
        $mahasiswa = Mahasiswa::with('user')
            ->findOrFail($id);

        $absensis = Absensi::where('mahasiswa_id', $id)
            ->latest()
            ->get();

        return view(
            'mentor.absensi.detail',
            compact(
                'mahasiswa',
                'absensis'
            )
        );
    }
}