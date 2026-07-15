<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\PeriodeMagang;


class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

   $mahasiswas = PendaftaranMagang::with('user')
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


return view('operator.mahasiswa.index', compact('mahasiswas'));
    }

    public function edit($id)
{
    $mhs = PendaftaranMagang::with('user')->findOrFail($id);

    return view('operator.mahasiswa.edit', compact('mhs'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email',
        'nim' => 'required|max:20',
        'universitas' => 'required|max:150',
        'program_studi' => 'required|max:100',
        'semester' => 'required|integer',
        'no_hp' => 'required|max:20',
        'alamat' => 'required',
    ]);

    $mhs = PendaftaranMagang::with('user')->findOrFail($id);

    // update user
    $mhs->user->update([
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
    ]);

    // update data pendaftaran
    $mhs->update([
        'nim' => $request->nim,
        'universitas' => $request->universitas,
        'program_studi' => $request->program_studi,
        'semester' => $request->semester,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,
    ]);

    return redirect()
        ->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil diperbarui.');
}

public function destroy($id)
{
    $mhs = PendaftaranMagang::findOrFail($id);

    $mhs->delete();

    return redirect()
        ->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil dihapus.');
}

public function create()
{
    $periode = PeriodeMagang::where('status','aktif')->get();

    return view('operator.mahasiswa.create', compact('periode'));
}

public function store(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|confirmed',

        'nim'=>'required',
        'universitas'=>'required',
        'program_studi'=>'required',
        'semester'=>'required',
        'no_hp'=>'required',
        'alamat'=>'required',
        'periode_magang_id'=>'required',
    ]);

    $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>'mahasiswa',
        'is_active'=>1,
        'no_hp'=>$request->no_hp,
    ]);

    PendaftaranMagang::create([
        'user_id'=>$user->id,
        'periode_magang_id'=>$request->periode_magang_id,
        'nim'=>$request->nim,
        'universitas'=>$request->universitas,
        'program_studi'=>$request->program_studi,
        'semester'=>$request->semester,
        'no_hp'=>$request->no_hp,
        'alamat'=>$request->alamat,
        'status'=>'menunggu',
    ]);

    return redirect()->route('mahasiswa.index')
        ->with('success','Mahasiswa berhasil ditambahkan.');
}
}