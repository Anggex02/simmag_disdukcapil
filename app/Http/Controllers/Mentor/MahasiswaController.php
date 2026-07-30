<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        // sementara
        $mentorId = 1;

        $mahasiswas = Mahasiswa::with('user')
            ->where('mentor_id', $mentorId)
            ->get();

        return view(
            'mentor.mahasiswa.index',
            compact('mahasiswas')
        );
    }

    public function show($id)
    {
        $mentorId = 1;

        $mahasiswa = Mahasiswa::with([
            'user',
            'logbooks'
        ])
        ->where('mentor_id',$mentorId)
        ->findOrFail($id);

        return view(
            'mentor.mahasiswa.detail',
            compact('mahasiswa')
        );
    }
}