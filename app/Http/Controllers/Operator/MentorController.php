<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
use Illuminate\Support\Facades\Hash;

class MentorController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mentors = Mentor::with('user')
            ->when($search, function ($query) use ($search) {

                $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {

                        $q->where('email', 'like', "%{$search}%")
                          ->orWhere('no_hp', 'like', "%{$search}%");

                    });

            })
            ->latest()
            ->get();

        return view('operator.mentor.index', compact('mentors'));
    }

    public function create()
    {
        return view('operator.mentor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|confirmed',
            'nip'=>'required|unique:mentors,nip',
            'jabatan'=>'required|max:100',
            'no_hp'=>'required|max:20',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'mentor',
            'is_active'=>1,
            'no_hp'=>$request->no_hp,
        ]);

        Mentor::create([
            'user_id'=>$user->id,
            'nama'=>$request->name,
            'nip'=>$request->nip,
            'jabatan'=>$request->jabatan,
            'no_hp'=>$request->no_hp,
        ]);

        return redirect()
            ->route('mentor.index')
            ->with('success','Mentor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);

        return view('operator.mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);

        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|unique:users,email,'.$mentor->user_id,
            'nip'=>'required|unique:mentors,nip,'.$mentor->id,
            'jabatan'=>'required|max:100',
            'no_hp'=>'required|max:20',
        ]);

        $mentor->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'no_hp'=>$request->no_hp,
        ]);

        $mentor->update([
            'nama'=>$request->name,
            'nip'=>$request->nip,
            'jabatan'=>$request->jabatan,
            'no_hp'=>$request->no_hp,
        ]);

        return redirect()
            ->route('mentor.index')
            ->with('success','Mentor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mentor = Mentor::with('user')->findOrFail($id);

        $user = $mentor->user;

        $mentor->delete();

        $user->delete();

        return redirect()
            ->route('mentor.index')
            ->with('success','Mentor berhasil dihapus.');
    }
}