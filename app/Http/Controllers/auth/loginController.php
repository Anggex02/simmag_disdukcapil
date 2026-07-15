<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required','email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials, $request->filled('remember'))) {

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput();

    }

    $request->session()->regenerate();

    $user = Auth::user();

    if (!$user->is_active) {

        Auth::logout();

        return back()->withErrors([
            'email' => 'Akun Anda tidak aktif.',
        ]);

     }

    switch ($user->role) {

        case 'superadmin':
            return redirect('/superadmin/dashboard');

        case 'operator':
            return redirect('/operator/dashboard');

        case 'mentor':
            return redirect('/mentor/dashboard');

        case 'mahasiswa':
            return redirect('/mahasiswa/dashboard');

        default:

            Auth::logout();

            return redirect('/login')->withErrors([
                'email' => 'Role tidak dikenali.',
            ]);

     }
    }
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}