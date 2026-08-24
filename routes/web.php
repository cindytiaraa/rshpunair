<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| ROUTE UMUM (BELUM LOGIN)
|--------------------------------------------------------------------------
*/

// Dashboard umum / landing
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Halaman layanan
Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

// Halaman struktur organisasi
Route::get('/struktur', function () {
    return view('struktur');
})->name('struktur');

// ========================
// LOGIN & LOGOUT
// ========================
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::resource('dashboard_admin',
        \App\Http\Controllers\Admin\DashboardAdminController::class
    );

    Route::resource('user', 
        \App\Http\Controllers\Admin\UserController::class
    );

    Route::resource('role', 
        \App\Http\Controllers\Admin\RoleController::class
    );

    Route::resource('jenis_hewan', 
        \App\Http\Controllers\Admin\JenisHewanController::class
    );

    Route::resource('ras_hewan', 
        \App\Http\Controllers\Admin\RasHewanController::class
    );

    Route::resource('kategori', 
        \App\Http\Controllers\Admin\KategoriController::class
    );

    Route::resource('kategori_klinis', 
        \App\Http\Controllers\Admin\KategoriKlinisController::class
    );

    Route::resource('pemilik',
        \App\Http\Controllers\Admin\PemilikController::class
    );

    Route::resource('pet',
        \App\Http\Controllers\Admin\PetController::class
    );

    Route::resource('temu_dokter',
        \App\Http\Controllers\Admin\TemuDokterController::class
    );

    Route::resource('rekam_medis',
        \App\Http\Controllers\Admin\RekamMedisController::class
    );
});



/*
|--------------------------------------------------------------------------
| RESEPSIONIS
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'resepsionis'])
    ->prefix('resepsionis')
    ->name('resepsionis.')
    ->group(function () {

    Route::resource('dashboard_resepsionis',
        \App\Http\Controllers\Resepsionis\DashboardResepsionisController::class
    );

    Route::resource('pemilik',
            \App\Http\Controllers\Resepsionis\PemilikController::class
        )->only(['create', 'store']);

    Route::resource('pet',
        \App\Http\Controllers\Resepsionis\PetController::class
    )->only(['create', 'store']);

    Route::resource('antrian',
        \App\Http\Controllers\Resepsionis\TemuDokterController::class
    )->only(['create', 'store']);
    
});



/*
|--------------------------------------------------------------------------
| PERAWAT
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'perawat'])
    ->prefix('perawat')
    ->name('perawat.')
    ->group(function () {

    Route::resource('dashboard_resepsionis',
        \App\Http\Controllers\Resepsionis\DashboardResepsionisController::class
    );

    Route::resource('rekam_medis',
        \App\Http\Controllers\Perawat\RekamMedisController::class
    );

    Route::get('/profil',
        [\App\Http\Controllers\Perawat\ProfilPerawatController::class, 'index']
    )->name('profil');
});



/*
|--------------------------------------------------------------------------
| DOKTER
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'dokter'])
    ->prefix('dokter')
    ->name('dokter.')
    ->group(function () {

    Route::get('/dashboard',
        [\App\Http\Controllers\Dokter\DashboardDokterController::class, 'index']
    )->name('dashboard_dokter');

    Route::get('/rekam_medis',
        [\App\Http\Controllers\Dokter\RekamMedisController::class, 'index']
    )->name('rekam_medis');

    Route::post('/rekam_medis/{id}/validasi',
        [\App\Http\Controllers\Dokter\RekamMedisController::class, 'validasi']
    )->name('rekam_medis.validasi');

    Route::get('/profil',
        [\App\Http\Controllers\Dokter\ProfilDokterController::class, 'index']
    )->name('profil');
});



/*
|--------------------------------------------------------------------------
| PEMILIK
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'pemilik'])
    ->prefix('pemilik')
    ->name('pemilik.')
    ->group(function () {

    Route::get('/dashboard',
        [\App\Http\Controllers\Pemilik\DashboardPemilikController::class, 'index']
    )->name('dashboard_pemilik');

    Route::get('/rekam_medis',
        [\App\Http\Controllers\Pemilik\RekamMedisController::class, 'index']
    )->name('rekam_medis');

    Route::get('/profil',
        [\App\Http\Controllers\Pemilik\ProfilPemilikController::class, 'index']
    )->name('profil');
});