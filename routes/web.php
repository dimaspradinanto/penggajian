<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\KaryawanController;
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
    return view('/layouts/app');
});
//route karyawan

Route::resource('karyawan', KaryawanController::class);

//route gaji 
Route::resource('gaji', GajiController::class);

// Rute baru untuk laporan gaji
Route::get('laporan-gaji', [GajiController::class, 'laporan'])->name('laporan.gaji');
