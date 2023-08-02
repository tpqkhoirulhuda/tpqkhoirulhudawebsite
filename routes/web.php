<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth', 'santriVerified')->group(function(){
    Route::get('/dashboard', [ProfileController::class, 'dashboard'] )->name('dashboard');
    Route::get('/dataguru',[ListUserController::class, 'ListGuru'])->name('dataguru');
    Route::get('/datasantri',[ListUserController::class, 'ListSantri'])->name('datasantri');

    Route::get('/hasil-penilaian/{id}', [NilaiController::class, 'HasilPenilaian'])->name('hasilpenilaian');

    // Route::get('/hasilpenilaian', function () {
    //     return view('hasilpenilaian');
    // })->middleware(['auth'])->name('hasilpenilaian');
    Route::post('/verifikasi-santri', [ProfileController::class, 'verifikasiSantri'])->name('verifikasi-santri');
    Route::post('/post/daftar-guru', [RegisteredUserController::class, 'storeGuruByAdmin'])->name('daftar-guru');
    Route::post('/post/daftar-santri', [RegisteredUserController::class, 'storeSantriByAdmin'])->name('daftar-santri');

    Route::get("/export/excel", [ExcelController::class, 'export'])->name("excel.export");

    Route::middleware('IsGuruAdmin')->group(function(){
        Route::get('/tambahsantribaru', [RegisteredUserController::class, 'SantriView'])->name('tambahsantribaru');
        Route::get('/hasilpenilaianguru', [NilaiController::class, 'PenilaianGuru'])->name('hasilpenilaianguru');
        Route::get('/penilaian', [NilaiController::class, 'Penilaian'])->middleware(['auth'])->name('penilaian');
        Route::post('/penilaian', [NilaiController::class, 'KasihNilai'])->name("kasihNilai");
        
        Route::patch('/user', [ListUserController::class, "updateUser"])->middleware(['auth'])->name("user.update");
        Route::post('/delete/user', [ListUserController::class, "deleteUser"])->name("user.delete");

        Route::middleware('IsAdmin')->group(function(){
            Route::get('/tambahgurubaru', function () {
                return view('tambahgurubaru');
            })->name('tambahgurubaru');

            Route::get('/kriteriapenilaian', [NilaiController::class, 'view'])->name('kriteriapenilaian');
            Route::post('/post/kriteria-penilaian', [NilaiController::class, 'KriteriaPenilaian'])->name("kriteria-penilaian");
        });
    });

    // Route::get('/penilaian',[ListUserController::class, 'ListSantri'])->middleware(['auth'])->name('penilaian');
});


Route::middleware('auth', 'santriVerified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
