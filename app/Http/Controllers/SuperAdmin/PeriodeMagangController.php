<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;

class PeriodeMagangController extends Controller
{
    public function index()
    {
        $periode = PeriodeMagang::latest()->get();

        return view('superadmin.periode-magang.index', compact('periode'));
    }

    public function create()
    {
        return view('superadmin.periode_magang.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PeriodeMagang $periodeMagang)
    {
        //
    }

    public function edit(PeriodeMagang $periodeMagang)
    {
        return view('superadmin.periode_magang.edit', compact('periodeMagang'));
    }

    public function update(Request $request, PeriodeMagang $periodeMagang)
    {
        //
    }

    public function destroy(PeriodeMagang $periodeMagang)
    {
        //
    }
}