<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Super Admin
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;
use App\Http\Controllers\SuperAdmin\OperatorController;

/*
|--------------------------------------------------------------------------
| Operator
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Operator\DashboardController as OperatorDashboard;
use App\Http\Controllers\Operator\PeriodeMagangController;
use App\Http\Controllers\Operator\ValidasiPendaftaranController;
use App\Http\Controllers\Operator\MahasiswaController;
use App\Http\Controllers\Operator\MentorController;

/*
|--------------------------------------------------------------------------
| Mentor
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Mentor\DashboardController as MentorDashboard;
use App\Http\Controllers\Mentor\MahasiswaController as MentorMahasiswaController;
use App\Http\Controllers\Mentor\LogbookController;

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboard;
use App\Http\Controllers\Mahasiswa\PendaftaranMagangController;

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Super Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:superadmin'])->group(function () {

    Route::get('/superadmin/dashboard', [SuperAdminDashboard::class, 'index'])
        ->name('superadmin.dashboard');

    Route::resource('/superadmin/operator', OperatorController::class)
        ->names('operator');
});

/*
|--------------------------------------------------------------------------
| Operator
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:operator'])->group(function () {

    Route::get('/operator/dashboard', [OperatorDashboard::class, 'index'])
        ->name('operator.dashboard');

    Route::resource('/operator/periode-magang', PeriodeMagangController::class)
        ->names('periode-magang');

    Route::resource('/operator/mentor', MentorController::class)
        ->names('mentor');

    Route::resource('/operator/mahasiswa', MahasiswaController::class)
        ->names('mahasiswa');

    Route::get('/operator/validasi', [ValidasiPendaftaranController::class, 'index'])
        ->name('operator.validasi');

    Route::get('/operator/validasi/{id}', [ValidasiPendaftaranController::class, 'show'])
        ->name('operator.validasi.show');

    Route::put('/operator/validasi/{id}/terima', [ValidasiPendaftaranController::class, 'terima'])
        ->name('operator.validasi.terima');

    Route::put('/operator/validasi/{id}/tolak', [ValidasiPendaftaranController::class, 'tolak'])
        ->name('operator.validasi.tolak');

    Route::get('/operator/mahasiswa/{id}/mentor', [MahasiswaController::class, 'mentor'])
        ->name('mahasiswa.mentor');

    Route::put('/operator/mahasiswa/{id}/mentor', [MahasiswaController::class, 'updateMentor'])
        ->name('mahasiswa.updateMentor');
});

/*
|--------------------------------------------------------------------------
| Mentor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mentor'])->group(function () {

    Route::get('/mentor/dashboard', [MentorDashboard::class, 'index'])
        ->name('mentor.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Mahasiswa
    |--------------------------------------------------------------------------
    */

    Route::get('/mentor/mahasiswa', [MentorMahasiswaController::class, 'index'])
        ->name('mentor.mahasiswa');

    Route::get('/mentor/mahasiswa/{id}', [MentorMahasiswaController::class, 'show'])
        ->name('mentor.mahasiswa.detail');

    /*
    |--------------------------------------------------------------------------
    | Logbook
    |--------------------------------------------------------------------------
    */

    Route::get('/mentor/logbook', [LogbookController::class, 'index'])
        ->name('mentor.logbook');

    Route::get('/mentor/logbook/{mahasiswa}', [LogbookController::class, 'detail'])
        ->name('mentor.logbook.detail');

    Route::get('/mentor/logbook/{mahasiswa}/{logbook}', [LogbookController::class, 'show'])
        ->name('mentor.logbook.show');

    Route::get('/mentor/logbook', [LogbookController::class, 'index'])
        ->name('mentor.logbook');

    Route::get('/mentor/logbook/{id}', [LogbookController::class, 'detail'])
        ->name('mentor.logbook.detail');

    Route::get('/mentor/logbook/show/{id}', [LogbookController::class, 'show'])
        ->name('mentor.logbook.show');

    /*
    |--------------------------------------------------------------------------
    | Absensi (sementara)
    |--------------------------------------------------------------------------
    */

    Route::view('/mentor/absensi', 'mentor.absensi.index')
        ->name('mentor.absensi');

    Route::view('/mentor/absensi/detail', 'mentor.absensi.detail')
        ->name('mentor.absensi.detail');

    /*
    |--------------------------------------------------------------------------
    | Pengaturan
    |--------------------------------------------------------------------------
    */

    Route::view('/mentor/pengaturan', 'mentor.pengaturan.index')
        ->name('mentor.pengaturan');
});

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', [MahasiswaDashboard::class, 'index'])
        ->name('mahasiswa.dashboard');

    Route::resource('/mahasiswa/pendaftaran-magang', PendaftaranMagangController::class)
        ->names('mahasiswa.pendaftaran');

    Route::get('/mahasiswa/logbook', function () {
        return view('mahasiswa.logbook.index');
    })->name('mahasiswa.logbook.index');

    Route::get('/mahasiswa/pengumuman', function () {
        return view('mahasiswa.pengumuman.index');
    })->name('mahasiswa.pengumuman.index');

    Route::get('/mahasiswa/profil', function () {
        return view('mahasiswa.profil.index');
    })->name('mahasiswa.profil.index');
});