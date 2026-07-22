<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Operator;
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $search = $request->search;

    $operators = Operator::with('user')
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

    return view('superadmin.operator', compact('operators'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('superadmin.operator-create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
   $request->validate([
    'name'=>'required|max:100',
    'email'=>'required|email|unique:users,email',
    'no_hp'=>'required|max:20',
    'nip'=>'required|max:30',
    'jabatan'=>'required|max:100',
    'password'=>'required|min:8|confirmed',
]);

    $user = User::create([
        'name'      => $request->name,
        'email'     => $request->email,
        'no_hp'     => $request->no_hp,
        'password'  => Hash::make($request->password),
        'role'      => 'operator',
        'is_active' => true,
    ]);

    Operator::create([

    'user_id'=>$user->id,

    'nama'=>$request->name,

    'nip'=>$request->nip,

    'jabatan'=>$request->jabatan,

    'no_hp'=>$request->no_hp,

]);

    return redirect()
        ->route('operator.index')
        ->with('success', 'Operator berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $operator = Operator::with('user')->findOrFail($id);

    return view('superadmin.operator-edit', compact('operator'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
{
    $request->validate([
        'name' => 'required|max:100',
        'email' => 'required|email|unique:users,email,' . $id,
        'no_hp' => 'required|max:20',
        'nip' => 'required|max:30',
        'jabatan' => 'required|max:100',
    ]);

    $operator = Operator::with('user')->findOrFail($id);

    $operator->user->update([
        'name' => $request->name,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
    ]);

    $operator->update([
        'nama' => $request->name,
        'nip' => $request->nip,
        'jabatan' => $request->jabatan,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()
        ->route('operator.index')
        ->with('success', 'Operator berhasil diperbarui.');
}
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy($id)
{
    $operator = Operator::with('user')->findOrFail($id);

    $operator->user->delete();

    $operator->delete();

    return redirect()
        ->route('operator.index')
        ->with('success','Operator berhasil dihapus.');
}
}
