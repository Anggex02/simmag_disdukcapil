<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class PenilaianController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['penilaian', 'mentor.user'])
            ->where('user_id', Auth::id())
            ->first();

        return view('mahasiswa.penilaian.index', compact('mahasiswa'));
    }

    public function cetak()
    {
        //
    }
}