<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\PendaftaranMagang;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
use Illuminate\Support\Facades\Hash;
use App\Models\PeriodeMagang;
use App\Models\Mahasiswa;



class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mahasiswas = Mahasiswa::with([
            'user',
            'mentor',
            'periodeMagang'
        ])
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
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);

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
            'no_hp' => 'required',
            'alamat' => 'required',

            'mentor_id' => 'nullable|exists:mentors,id',
        ]);

        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);

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
            'jurusan' => $request->program_studi,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'mentor_id' => $request->mentor_id,
            'periode_magang_id' => $request->periode_magang_id,
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);

        $user = $mahasiswa->user;

        $mahasiswa->delete();

        $user->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function create()
    {
        $periode = PeriodeMagang::where('status', 'aktif')->get();

        return view('operator.mahasiswa.create', compact('periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',

            'nim' => 'required',
            'universitas' => 'required',
            'program_studi' => 'required',
            'semester' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'periode_magang_id' => 'required',
            'mentor_id' => 'nullable|exists:mentors,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
            'is_active' => 1,
            'no_hp' => $request->no_hp,
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'periode_magang_id' => $request->periode_magang_id,
            'mentor_id' => $request->mentor_id,

            'nim' => $request->nim,
            'universitas' => $request->universitas,
            'jurusan' => $request->program_studi,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,

            'status' => 'belum_magang'
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }
    public function mentor($id)
    {
        $mahasiswa = Mahasiswa::with('mentor')->findOrFail($id);

        $mentors = Mentor::all();

        return view(
            'operator.mahasiswa.mentor',
            compact(
                'mahasiswa',
                'mentors'
            )
        );
    }

    public function updateMentor(Request $request, $id)
    {
        $request->validate([
            'mentor_id' => 'required|exists:mentors,id'
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'mentor_id' => $request->mentor_id
        ]);

        return redirect()
            ->route('mahasiswa.index')
            ->with(
                'success',
                'Mentor berhasil ditentukan.'
            );
    }
}
