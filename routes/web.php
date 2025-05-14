<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\NilaiAlternatifController;
use App\Http\Controllers\DeskripsiController;
use App\Http\Controllers\PerhitunganController;


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
    return view('layout.dashboard');
});
Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif.alternatif');


Route::get('/nilai-alternatif', [NilaiAlternatifController::class, 'index'])->name('nilai_alternatif.nilai_alternatif');
Route::get('/nilai-alternatif-entry', [NilaiAlternatifController::class, 'create'])->name('nilai_alternatif.nilai_alternatif-entry');
Route::get('/get-subkriteria/{kriteria_id}', [NilaiAlternatifController::class, 'getSubKriteria']);
Route::post('/nilai-alternatif-store', [NilaiAlternatifController::class, 'store'])->name('nilai_alternatif.nilai_alternatif-store');
Route::get('/nilai-alternatif-edit{id}', [NilaiAlternatifController::class, 'edit'])->name('nilai_alternatif.nilai_alternatif-edit');
Route::post('/nilai-alternatif-update{id}', [NilaiAlternatifController::class, 'update'])->name('nilai_alternatif.nilai_alternatif-update');
Route::get('/nilai-alternatif-hapus{id}', [NilaiAlternatifController::class, 'hapus'])->name('nilai_alternatif.hapus');
Route::get('/get-deskripsi-skala/{id}', [NilaiAlternatifController::class, 'getDeskripsiSkala']);

Route::get('/sub-kriteria', [SubkriteriaController::class, 'index'])->name('sub_kriteria.sub_kriteria');
Route::get('/sub-kriteria-entry', [SubkriteriaController::class, 'create'])->name('sub_kriteria.sub_kriteria-entry');
Route::post('/sub-kriteria-store', [SubkriteriaController::class, 'store'])->name('sub_kriteria.sub_kriteria-store');
Route::get('/sub-kriteria-edit{id}', [SubkriteriaController::class, 'edit'])->name('sub_kriteria.sub_kriteria-edit');
Route::get('/sub-kriteria-update{id}', [SubkriteriaController::class, 'update'])->name('sub_kriteria.sub_kriteria-update');
Route::get('/sub-kriteria-hapus{id}', [SubkriteriaController::class, 'hapus'])->name('sub_kriteria.hapus');

Route::get('/alternatif-entry', [AlternatifController::class, 'create'])->name('alternatif.alternatif-entry');
Route::post('/alternatif-store', [AlternatifController::class, 'store'])->name('alternatif.alternatif-store');
Route::get('/alternatif-edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.alternatif-edit');
Route::post('/alternatif-update/{id}', [AlternatifController::class, 'update'])->name('alternatif.alternatif-update');
Route::get('/alternatif/hapus/{id}', [AlternatifController::class, 'hapus'])->name('alternatif.hapus');

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.kriteria');
Route::get('/kriteria-entry', [KriteriaController::class, 'create'])->name('kriteria.kriteria-entry');
Route::post('/kriteria-store', [KriteriaController::class, 'store'])->name('kriteria.kriteria-store');
Route::get('/kriteria-edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.kriteria-edit');
Route::get('/kriteria-update/{id}', [KriteriaController::class, 'update'])->name('kriteria.kriteria-update');
Route::get('/kriteria-hapus/{id}', [KriteriaController::class, 'hapus'])->name('kriteria.hapus');

Route::get('/deskripsi/{id}', [DeskripsiController::class, 'index'])->name('deskripsi.deskripsi');
Route::post('/deskripsi-insert', [DeskripsiController::class, 'insert'])->name('deskripsi.deskripsi-insert');
Route::get('/deskripsi-edit/{id}', [DeskripsiController::class, 'edit'])->name('deskripsi.deskripsi-edit');
Route::put('/deskripsi-update/{id}', [DeskripsiController::class, 'update'])->name('deskripsi.deskripsi-update');
Route::get('/deskripsi-hapus/{id}', [DeskripsiController::class, 'hapus'])->name('deskripsi.hapus');

Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.perhitungan');

Route::get('/user', function () {return view('layout.user');});
Route::get('/dashboard', function () {return view('layout.dashboard');})->name('dashboard');

// Route::post('/alternatif-entry', function () {return view('layout.dashboard');})->name('dashboard');
