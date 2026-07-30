<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::with(['user', 'penilaian'])
            ->latest()
            ->get();

        return view(
            'mentor.penilaian.index',
            compact('mahasiswas')
        );
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::with(['user', 'penilaian'])
            ->findOrFail($id);

        return view(
            'mentor.penilaian.edit',
            compact('mahasiswa')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'disiplin' => 'required|numeric|min:0|max:100',
            'kerjasama' => 'required|numeric|min:0|max:100',
            'komunikasi' => 'required|numeric|min:0|max:100',
            'tanggung_jawab' => 'required|numeric|min:0|max:100',
            'inisiatif' => 'required|numeric|min:0|max:100',
            'catatan' => 'nullable|string'
        ]);

        $nilaiAkhir = (
            $request->disiplin +
            $request->kerjasama +
            $request->komunikasi +
            $request->tanggung_jawab +
            $request->inisiatif
        ) / 5;

        Penilaian::updateOrCreate(

            [
                'mahasiswa_id' => $id
            ],

            [
                // sementara mentor_id = 1 dulu
                // nanti kita ubah mengikuti mentor login
                'mentor_id' => 1,

                'disiplin' => $request->disiplin,
                'kerjasama' => $request->kerjasama,
                'komunikasi' => $request->komunikasi,
                'tanggung_jawab' => $request->tanggung_jawab,
                'inisiatif' => $request->inisiatif,
                'nilai_akhir' => $nilaiAkhir,
                'catatan' => $request->catatan
            ]
        );

        return redirect()
            ->route('mentor.penilaian')
            ->with('success', 'Penilaian berhasil disimpan.');
    }
}