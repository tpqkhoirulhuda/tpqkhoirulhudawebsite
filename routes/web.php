<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListUserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dataguru',[ListUserController::class, 'ListGuru'])->middleware(['auth'])->name('dataguru');
Route::get('/datasantri',[ListUserController::class, 'ListSantri'])->middleware(['auth'])->name('datasantri');

Route::get('/hasilpenilaian', function () {
    return view('hasilpenilaian');
})->middleware(['auth', 'verified'])->name('hasilpenilaian');

Route::get('/penilaian', function () {
    return view('penilaian');
})->middleware(['auth', 'verified'])->name('penilaian');

Route::get('/kriteriapenilaian', function () {
    return view('kriteriapenilaian');
})->middleware(['auth', 'verified'])->name('kriteriapenilaian');

Route::get('/tambahsantribaru', function () {
    return view('tambahsantribaru');
})->middleware(['auth', 'verified'])->name('tambahsantribaru');

Route::get('/tambahgurubaru', function () {
    return view('tambahgurubaru');
})->middleware(['auth', 'verified'])->name('tambahgurubaru');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
