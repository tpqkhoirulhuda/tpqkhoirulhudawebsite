<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListUserController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', [ProfileController::class, 'dashboard'] )->middleware(['auth'])->name('dashboard');

Route::get('/dataguru',[ListUserController::class, 'ListGuru'])->middleware(['auth'])->name('dataguru');
Route::get('/datasantri',[ListUserController::class, 'ListSantri'])->middleware(['auth'])->name('datasantri');

// Route::get('/hasilpenilaian', function () {
//     return view('hasilpenilaian');
// })->middleware(['auth'])->name('hasilpenilaian');

Route::get('/hasil-penilaian/{id}', [NilaiController::class, 'HasilPenilaian'])->name('hasilpenilaian');

Route::get('/penilaian', [NilaiController::class, 'Penilaian'])->middleware(['auth'])->name('penilaian');

Route::get('/kriteriapenilaian', [NilaiController::class, 'view'])->middleware(['auth'])->name('kriteriapenilaian');

Route::get('/tambahsantribaru', [RegisteredUserController::class, 'SantriView'])->middleware(['auth'])->name('tambahsantribaru');

Route::get('/tambahgurubaru', function () {
    return view('tambahgurubaru');
})->middleware(['auth', 'verified'])->name('tambahgurubaru');


Route::post('/verifikasi-santri', [ProfileController::class, 'verifikasiSantri'])->middleware(['auth'])->name('verifikasi-santri');
Route::post('/post/daftar-guru', [RegisteredUserController::class, 'storeGuruByAdmin'])->middleware(['auth'])->name('daftar-guru');
Route::post('/post/daftar-santri', [RegisteredUserController::class, 'storeSantriByAdmin'])->middleware(['auth'])->name('daftar-santri');
Route::post('/post/kriteria-penilaian', [NilaiController::class, 'KriteriaPenilaian'])->middleware(['auth'])->name("kriteria-penilaian");

Route::middleware('auth', 'santriVerified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
