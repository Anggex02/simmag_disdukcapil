<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Mahasiswa;

class AbsensiController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')
            ->withCount('absensis')
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