<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\Mentor;

class LogbookController extends Controller
{
    /**
     * List mahasiswa
     */
    public function index()
    {
        $mentor = Mentor::where('user_id', auth()->id())->firstOrFail();

        $mahasiswas = Mahasiswa::with('user')
            ->withCount('logbooks')
            ->where('mentor_id', $mentor->id)
            ->latest()
            ->get();

        return view(
            'mentor.logbook.index',
            compact('mahasiswas')
        );
    }

    /**
     * List logbook mahasiswa
     */
    public function detail($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);

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
     * Detail logbook
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

    /**
     * Update status logbook
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,revisi',
            'komentar_mentor' => 'nullable|string'
        ]);

        $logbook = Logbook::findOrFail($id);

        $logbook->update([
            'status' => $request->status,
            'komentar_mentor' => $request->komentar_mentor
        ]);

        return redirect()
            ->route('mentor.logbook.detail', $logbook->mahasiswa_id)
            ->with('success', 'Logbook berhasil diperbarui.');
    }
}