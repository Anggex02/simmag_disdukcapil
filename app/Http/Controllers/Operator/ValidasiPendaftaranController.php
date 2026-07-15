<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;

class ValidasiPendaftaranController extends Controller
{
    /**
     * Menampilkan seluruh pendaftaran magang
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $pendaftaran = PendaftaranMagang::with('user')
            ->when($search, function ($query) use ($search) {

                $query->where('nim', 'like', "%{$search}%")
                    ->orWhere('universitas', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {

                        $q->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");

                    });

            })
            ->latest()
            ->get();

        return view('operator.validasi', compact('pendaftaran'));
    }

    /**
     * Menampilkan detail pendaftaran
     */
    public function show($id)
    {
        $pendaftaran = PendaftaranMagang::with('user')->findOrFail($id);

        return view('operator.detail-validasi', compact('pendaftaran'));
    }

    /**
     * Menerima pendaftaran
     */
    public function terima($id)
    {
        $pendaftaran = PendaftaranMagang::findOrFail($id);

        $pendaftaran->update([
            'status' => 'diterima'
        ]);

        return redirect()
    ->route('operator.validasi')
    ->with('success', 'Mahasiswa berhasil diterima.');
    }

    /**
     * Menolak pendaftaran
     */
    public function tolak($id)
    {
        $pendaftaran = PendaftaranMagang::findOrFail($id);

        $pendaftaran->update([
            'status' => 'ditolak'
        ]);

        return redirect()
    ->route('operator.validasi')
    ->with('success', 'Mahasiswa berhasil ditolak.');
    }
}