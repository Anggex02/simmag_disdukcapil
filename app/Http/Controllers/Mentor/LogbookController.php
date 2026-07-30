<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Models\Mahasiswa;

class LogbookController extends Controller
{
    /**
     * List mahasiswa
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')
            ->withCount('logbooks')
            ->latest()
            ->get();

        return view(
            'mentor.logbook.index',
            compact('mahasiswas')
        );
    }

    /**
     * List logbook milik satu mahasiswa
     */
    public function detail($id)
    {
        $mahasiswa = Mahasiswa::with('user')
            ->findOrFail($id);

        $logbooks = Logbook::where('mahasiswa_id', $id)
            ->latest()
            ->get();

        return view(
            'mentor.logbook.detail',
            compact(
                'mahasiswa',
                'logbooks'
            )
        );
    }

    /**
     * Detail satu logbook
     */
    public function show($id)
    {
        $logbook = Logbook::with('mahasiswa.user')
            ->findOrFail($id);

        return view(
            'mentor.logbook.show',
            compact('logbook')
        );
    }
}