<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);
    Route::get('/mahasiswa/{id}/destroy', [MahasiswaController::class, 'destroy']);
   
    // mahasiswa
    Route::get('/dosen', [DosenController::class, 'index']);
    Route::get('/dosen/create', [DosenController::class, 'create']);
    Route::post('/dosen/store', [DosenController::class, 'store']);
    Route::get('/dosen/{id}/edit', [DosenController::class, 'edit']);
    Route::put('/dosen/{id}/update', [DosenController::class, 'update']);
    Route::get('/dosen/{id}/destroy', [DosenController::class, 'destroy']);
    
    // matkul
    Route::get('/matkul', [MatkulController::class, 'index']);
    Route::get('/matkul/create', [MatkulController::class, 'create']);
    Route::post('/matkul/store', [MatkulController::class, 'store']);
    Route::get('/matkul/{id}/edit', [MatkulController::class, 'edit']);
    Route::put('/matkul/{id}/update', [MatkulController::class, 'update']);
    Route::get('/matkul/{id}/destroy', [MatkulController::class, 'destroy']);
    
    // nilai
    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::get('/nilai/create', [NilaiController::class, 'create']);
    Route::post('/nilai/store', [NilaiController::class, 'store']);
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit']);
    Route::put('/nilai/{id}/update', [NilaiController::class, 'update']);
    Route::get('/nilai/{id}/destroy', [NilaiController::class, 'destroy']);

});

require __DIR__.'/auth.php';