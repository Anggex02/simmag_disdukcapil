<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;

class PeriodeMagangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $periodes = PeriodeMagang::when($search, function ($query) use ($search) {

            $query->where('nama_periode', 'like', "%{$search}%");

        })->latest()->get();

        return view('operator.periode-magang.index', compact('periodes'));
    }

    public function create()
    {
        return view('operator.periode-magang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_periode' => 'required|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required'
        ]);

        PeriodeMagang::create($request->all());

        return redirect()
            ->route('periode-magang.index')
            ->with('success','Periode magang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $periode = PeriodeMagang::findOrFail($id);

        return view('operator.periode-magang.edit', compact('periode'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_periode' => 'required|max:100',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'status' => 'required'
        ]);

        $periode = PeriodeMagang::findOrFail($id);

        $periode->update($request->all());

        return redirect()
            ->route('periode-magang.index')
            ->with('success','Periode berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $periode = PeriodeMagang::findOrFail($id);

        $periode->delete();

        return redirect()
            ->route('periode-magang.index')
            ->with('success','Periode berhasil dihapus.');
    }
}