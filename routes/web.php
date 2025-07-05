<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

// Controller Petani
use App\Http\Controllers\Petani\DashboardController as PetaniDashboardController;
use App\Http\Controllers\Petani\GejalaController as PetaniGejalaController;
use App\Http\Controllers\Petani\RiwayatGejalaController;
use App\Http\Controllers\Petani\HasilKeputusanController as PetaniHasilKeputusanController;

// Controller Ahli
use App\Http\Controllers\Ahli\DashboardController as AhliDashboardController;
use App\Http\Controllers\Ahli\VerifikasiGejalaController;
use App\Http\Controllers\Ahli\KriteriaController;
use App\Http\Controllers\Ahli\GejalaController as AhliGejalaController;
use App\Http\Controllers\Ahli\PenyakitController;
use App\Http\Controllers\Ahli\PerhitunganAhpController;
use App\Http\Controllers\Ahli\HasilKeputusanController as AhliHasilKeputusanController;

// Controller Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GejalaController as AdminGejalaController;
use App\Http\Controllers\Admin\GejalaPilihanController;
use App\Http\Controllers\Admin\UserController;

// Route::get('/', function () {
//     return redirect()->route('login');
// });

Route::get('/', [LoginController::class, 'index'])->name('login'); // ✅ HALAMAN FORM LOGIN
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses'); // ✅ PROSES LOGIN
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.proses');

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    /** PETANI */
    Route::prefix('petani')->middleware('userAkses:Petani')->group(function () {
        Route::get('/dashboard', [PetaniDashboardController::class, 'index'])->name('petani.dashboard');
        Route::get('/hasil/detail', [PetaniDashboardController::class, 'detailHasil'])->name('hasil.detail');

        Route::get('/gejala', [PetaniGejalaController::class, 'index'])->name('gejala.index');
        Route::post('/gejala', [PetaniGejalaController::class, 'store'])->name('gejala.store');

        Route::get('/riwayat', [RiwayatGejalaController::class, 'index'])->name('riwayat.index');
        Route::get('/riwayat/{id}/edit', [RiwayatGejalaController::class, 'edit'])->name('riwayat.edit');
        Route::put('/riwayat/{id}', [RiwayatGejalaController::class, 'update'])->name('riwayat.update');
        Route::delete('/riwayat/{id}', [RiwayatGejalaController::class, 'destroy'])->name('riwayat.destroy');

        Route::get('/hasil-keputusan', [PetaniHasilKeputusanController::class, 'index'])->name('hasilKeputusan.index');
        Route::get('/hasil-keputusan/{id}', [PetaniHasilKeputusanController::class, 'show'])->name('hasilKeputusan.show');
        Route::get('/hasil-keputusan/export-pdf', [PetaniHasilKeputusanController::class, 'exportPDF'])->name('hasilKeputusan.export');
    });

    /** AHLI */
    Route::prefix('ahli')->middleware('userAkses:Ahli')->group(function () {
        Route::get('/dashboard', [AhliDashboardController::class, 'index'])->name('ahli.dashboard');

        Route::get('/verifikasi-gejala', [VerifikasiGejalaController::class, 'index'])->name('ahli.verifikasi.index');
        Route::put('/verifikasi-gejala/{id}', [VerifikasiGejalaController::class, 'verifikasi'])->name('ahli.verifikasi.update');

        Route::resource('kriteria', KriteriaController::class)->names([
            'index' => 'ahli.kriteria.index',
            'store' => 'ahli.kriteria.store',
            'edit' => 'kriteria.edit',
            'update' => 'ahli.kriteria.update',
            'destroy' => 'ahli.kriteria.destroy'
        ]);
        Route::get('/kriteria/default', [KriteriaController::class, 'insertDefaultKriteria'])->name('ahli.kriteria.default');

        Route::resource('gejala', AhliGejalaController::class)->names([
            'index' => 'ahli.gejala.index',
            'create' => 'ahli.gejala.create',
            'store' => 'ahli.gejala.store',
            'edit' => 'ahli.gejala.edit',
            'update' => 'ahli.gejala.update',
            'destroy' => 'ahli.gejala.destroy'
        ]);

        Route::resource('penyakit', PenyakitController::class)->names([
            'index' => 'ahli.penyakit.index',
            'create' => 'ahli.penyakit.create',
            'store' => 'ahli.penyakit.store',
            'edit' => 'ahli.penyakit.edit',
            'update' => 'ahli.penyakit.update',
            'destroy' => 'ahli.penyakit.destroy'
        ]);

        Route::get('/perhitungan', [PerhitunganAhpController::class, 'index'])->name('ahli.perhitungan_ahp.index');
        Route::get('/perhitungan/{id}', [PerhitunganAhpController::class, 'list'])->name('ahli.perhitungan_ahp.hasil');
        Route::delete('/perhitungan/{id}', [PerhitunganAhpController::class, 'destroy'])->name('ahli.perhitungan_ahp.destroy');
        Route::get('/perhitungan/{id}/export-pdf', [PerhitunganAhpController::class, 'exportPDF'])->name('ahli.perhitungan_ahp.exportPDF');
    });

    /** ADMIN */
    Route::prefix('admin')->middleware('userAkses:Admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('gejala', AdminGejalaController::class)->except(['show'])->names([
            'index' => 'admin.gejala.index',
            'create' => 'admin.gejala.create',
            'store' => 'admin.gejala.store',
            'edit' => 'admin.gejala.edit',
            'update' => 'admin.gejala.update',
            'destroy' => 'admin.gejala.destroy',
        ]);

        Route::resource('gejala-pilihan', GejalaPilihanController::class)->parameters([
            'gejala-pilihan' => 'id'
        ])->names([
            'index' => 'admin.gejalaPilihan.index',
            'create' => 'admin.gejalaPilihan.create',
            'store' => 'admin.gejalaPilihan.store',
            'edit' => 'admin.gejalaPilihan.edit',
            'update' => 'admin.gejalaPilihan.update',
            'destroy' => 'admin.gejalaPilihan.destroy',
        ]);

        Route::resource('users', UserController::class)->parameters([
            'users' => 'id'
        ])->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy',
        ]);
    });
});

Route::get('home', function(){
    return redirect('login');
});


