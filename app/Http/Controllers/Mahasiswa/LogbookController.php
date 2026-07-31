<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogbookController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        $logbooks = Logbook::where('mahasiswa_id', $mahasiswa->id)
            ->latest()
            ->get();

        return view(
            'mahasiswa.logbook.index',
            compact('logbooks')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required',
            'hasil_pekerjaan' => 'required',
            'kendala' => 'nullable',
        ]);

        $mahasiswa = Mahasiswa::where('user_id', Auth::id())->firstOrFail();

        Logbook::create([
            'mahasiswa_id' => $mahasiswa->id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'hasil_pekerjaan' => $request->hasil_pekerjaan,
            'kendala' => $request->kendala,
        ]);

        return back()->with('success', 'Logbook berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $logbook = Logbook::findOrFail($id);

        if ($logbook->status == 'disetujui') {
            return back()->with('error', 'Logbook yang sudah disetujui tidak dapat dihapus.');
        }

        $logbook->delete();

        return back()->with('success', 'Logbook berhasil dihapus.');
    }
}