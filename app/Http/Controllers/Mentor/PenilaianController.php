<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index()
    {
        $mentor = Mentor::where('user_id', Auth::id())->first();

        $mahasiswas = Mahasiswa::with(['user', 'penilaian'])
            ->where('mentor_id', $mentor->id)
            ->latest()
            ->get();
        return view(
            'mentor.penilaian.index',
            compact('mahasiswas')
        );
    }

    public function edit($id)
    {
        $mentor = Mentor::where('user_id', Auth::id())->first();

        $mahasiswa = Mahasiswa::with(['user', 'penilaian'])
            ->where('mentor_id', $mentor->id)
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
                'tanggung_jawab' => 'required|numeric|min:0|max:100',
                'komunikasi' => 'required|numeric|min:0|max:100',
                'kemampuan_teknis' => 'required|numeric|min:0|max:100',
                'kerja_sama' => 'required|numeric|min:0|max:100',
                'inisiatif' => 'required|numeric|min:0|max:100',
                'etika_kerja' => 'required|numeric|min:0|max:100',
                'catatan' => 'nullable|string',
            ]);

            $mentor = \App\Models\Mentor::where('user_id', auth()->id())->firstOrFail();

            $nilaiAkhir = (
                $request->disiplin +
                $request->tanggung_jawab +
                $request->komunikasi +
                $request->kemampuan_teknis +
                $request->kerja_sama +
                $request->inisiatif +
                $request->etika_kerja
            ) / 7;

            Penilaian::updateOrCreate(

                [
                    'mahasiswa_id' => $id
                ],

                [
                    'mentor_id' => $mentor->id,

                    'disiplin' => $request->disiplin,
                    'tanggung_jawab' => $request->tanggung_jawab,
                    'komunikasi' => $request->komunikasi,
                    'kemampuan_teknis' => $request->kemampuan_teknis,
                    'kerja_sama' => $request->kerja_sama,
                    'inisiatif' => $request->inisiatif,
                    'etika_kerja' => $request->etika_kerja,

                    'nilai_akhir' => $nilaiAkhir,
                    'catatan' => $request->catatan,
                ]

            );

            return redirect()
                ->route('mentor.penilaian')
                ->with('success', 'Penilaian berhasil disimpan.');
        }
    }