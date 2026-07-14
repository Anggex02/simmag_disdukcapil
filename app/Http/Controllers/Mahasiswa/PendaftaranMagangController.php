<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranMagangController extends Controller
{
    /**
     * Menampilkan form pendaftaran magang
     */
    public function index()
    {
        $periode = PeriodeMagang::where('status', 'aktif')->get();

        return view('mahasiswa.pendaftaran-magang.index', compact('periode'));

        $periode = PeriodeMagang::where('status','aktif')->get();

        if($periode->isEmpty()){

            return back()->with(
                'error',
                'Belum ada periode magang yang dibuka.'
            );

        }
    }
    

    /**
     * Menyimpan pendaftaran
     */
    public function store(Request $request)
{
        $cek = PendaftaranMagang::where('user_id', Auth::id())->first();

if ($cek) {
    return back()->with('error', 'Anda sudah pernah mengajukan pendaftaran magang.');
}
    $request->validate([

        'periode_magang_id' => 'required|exists:periode_magangs,id',

        'nim' => 'required|max:20',

        'universitas' => 'required|max:150',

        'program_studi' => 'required|max:100',

        'semester' => 'required|integer|min:1|max:14',

        'no_hp' => 'required|max:20',

        'alamat' => 'required',

        'cv' => 'required|mimes:pdf|max:2048',

        'surat_pengantar' => 'required|mimes:pdf|max:2048',

    ]);

    // Upload CV
    $cv = $request->file('cv')->store('cv', 'public');

    // Upload Surat Pengantar
    $surat = $request->file('surat_pengantar')->store('surat_pengantar', 'public');
    



    PendaftaranMagang::create([

        'user_id' => Auth::id(),

        'periode_magang_id' => $request->periode_magang_id,

        'nim' => $request->nim,

        'universitas' => $request->universitas,

        'program_studi' => $request->program_studi,

        'semester' => $request->semester,

        'no_hp' => $request->no_hp,

        'alamat' => $request->alamat,

        'cv' => $cv,

        'surat_pengantar' => $surat,

        'status' => 'menunggu',

    ]);

    return redirect()
        ->back()
        ->with('success', 'Pendaftaran magang berhasil dikirim.');
}

    /**
     * Detail pendaftaran
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Form edit
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update data
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Hapus data
     */
    public function destroy(string $id)
    {
        //
    }
}