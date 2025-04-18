<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternatifController;

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
    return view('/layout/main');
});
Route::get('/alternatif', [AlternatifController::class, 'index'])->name('data_alternatif.alternatif');
Route::get('/alternatif-entry', [AlternatifController::class, 'create'])->name('data_alternatif.alternatif-entry');
Route::post('/alternatif-store', [AlternatifController::class, 'store'])->name('data_alternatif.alternatif-store');
Route::get('/alternatif-rating', [AlternatifController::class, 'rating'])->name('data_alternatif.alternatif-rating');
Route::get('/alternatif/hapus/{id}', [AlternatifController::class, 'hapus'])->name('alternatif.hapus');



