<?php
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use Illuminate\Support\Facades\Route;

Route::resource('provinsis', ProvinsiController::class);
Route::resource('kabupatens', KabupatenController::class);
// Routes untuk laporan
Route::get('laporan/provinsi', [LaporanController::class, 'laporanPerProvinsi'])->name('laporan.provinsi');
Route::get('laporan/kabupaten', [LaporanController::class, 'laporanPerKabupaten'])->name('laporan.kabupaten');

