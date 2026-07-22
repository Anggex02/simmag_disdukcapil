<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
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
    $mahasiswa = PendaftaranMagang::findOrFail($id);

    $mentors = Mentor::all();

    return view(
        'operator.mahasiswa.edit',
        compact('mahasiswa', 'mentors')
    );
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',

        'nim' => 'required',
        'universitas' => 'required',
        'program_studi' => 'required',
        'semester' => 'required|numeric',
        'no_hp' => 'required',
        'alamat' => 'required',

        'mentor_id' => 'nullable|exists:mentors,id',
        'divisi' => 'nullable|string|max:100',
        'tanggal_mulai' => 'nullable|date',
        'tanggal_selesai' => 'nullable|date',
    ]);

    $mahasiswa = PendaftaranMagang::with('user')->findOrFail($id);

    /*
    |-----------------------------------
    | Update User
    |-----------------------------------
    */

    $mahasiswa->user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    /*
    |-----------------------------------
    | Update Data Magang
    |-----------------------------------
    */

    $mahasiswa->update([
        'nim' => $request->nim,
        'universitas' => $request->universitas,
        'program_studi' => $request->program_studi,
        'semester' => $request->semester,
        'no_hp' => $request->no_hp,
        'alamat' => $request->alamat,

        'mentor_id' => $request->mentor_id,
        'divisi' => $request->divisi,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
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