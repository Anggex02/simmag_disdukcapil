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
use App\Http\Controllers\Mentor\AbsensiController as MentorAbsensiController;
use App\Http\Controllers\Mentor\PenilaianController;

/*
|--------------------------------------------------------------------------
| Mahasiswa
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboard;
use App\Http\Controllers\Mahasiswa\PendaftaranMagangController;
use App\Http\Controllers\Mahasiswa\AbsensiController as MahasiswaAbsensiController;
use App\Http\Controllers\Mahasiswa\LogbookController as MahasiswaLogbookController;



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

    Route::get('/mentor/logbook/{id}', [LogbookController::class, 'detail'])
        ->name('mentor.logbook.detail');

    Route::get('/mentor/logbook/show/{id}', [LogbookController::class, 'show'])
        ->name('mentor.logbook.show');

    Route::put('/mentor/logbook/{id}', [LogbookController::class, 'update'])
        ->name('mentor.logbook.update');

    /*
    |--------------------------------------------------------------------------
    | Absensi
    |--------------------------------------------------------------------------
    */

    Route::get('/mentor/absensi', [MentorAbsensiController::class, 'index'])
        ->name('mentor.absensi');

    Route::get('/mentor/absensi/{id}', [MentorAbsensiController::class, 'detail'])
        ->name('mentor.absensi.detail');

    /*
    |--------------------------------------------------------------------------
    | Penilaian
    |--------------------------------------------------------------------------
    */

    Route::get('/mentor/penilaian', [PenilaianController::class, 'index'])
        ->name('mentor.penilaian');

    Route::get('/mentor/penilaian/{id}', [PenilaianController::class, 'edit'])
        ->name('mentor.penilaian.edit');

    Route::put('/mentor/penilaian/{id}', [PenilaianController::class, 'update'])
        ->name('mentor.penilaian.update');

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

    /*
    |--------------------------------------------------------------------------
    | Absensi
    |--------------------------------------------------------------------------
    */

    Route::get('/mahasiswa/absensi', [MahasiswaAbsensiController::class, 'index'])
        ->name('mahasiswa.absensi');

    Route::post('/mahasiswa/absensi/masuk', [MahasiswaAbsensiController::class, 'absenMasuk'])
        ->name('mahasiswa.absensi.masuk');

    Route::post('/mahasiswa/absensi/pulang', [MahasiswaAbsensiController::class, 'absenPulang'])
        ->name('mahasiswa.absensi.pulang');

    /*
    |--------------------------------------------------------------------------
    | Logbook
    |--------------------------------------------------------------------------
    */

    Route::get('/mahasiswa/logbook', [MahasiswaLogbookController::class, 'index'])
        ->name('mahasiswa.logbook.index');

    Route::post('/mahasiswa/logbook', [MahasiswaLogbookController::class, 'store'])
        ->name('mahasiswa.logbook.store');

    Route::delete('/mahasiswa/logbook/{id}', [MahasiswaLogbookController::class, 'destroy'])
        ->name('mahasiswa.logbook.destroy');

    /*
    |--------------------------------------------------------------------------
    | Pengumuman
    |--------------------------------------------------------------------------
    */

    Route::get('/mahasiswa/pengumuman', function () {
        return view('mahasiswa.pengumuman.index');
    })->name('mahasiswa.pengumuman.index');

    /*
    |--------------------------------------------------------------------------
    | Profil
    |--------------------------------------------------------------------------
    */

    Route::get('/mahasiswa/profil', function () {
        return view('mahasiswa.profil.index');
    })->name('mahasiswa.profil.index');

});

