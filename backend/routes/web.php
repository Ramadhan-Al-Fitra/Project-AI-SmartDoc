<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConverterController;

/*
|--------------------------------------------------------------------------
| Halaman Utama (Landing Page)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| Fitur Konverter (Unggah & Proses)
|--------------------------------------------------------------------------
*/
// Halaman Form Upload
Route::get('/converter', [ConverterController::class, 'index'])->name('converter.index');
// Proses Upload File
Route::post('/converter/upload', [ConverterController::class, 'upload'])->name('converter.upload');

// Simulasi Loading / Pemrosesan AI
Route::get('/processing/{id}', [ConverterController::class, 'processing'])->name('converter.processing');
Route::get('/process_complete/{id}', [ConverterController::class, 'process_complete'])->name('converter.process_complete');


/*
|--------------------------------------------------------------------------
| Hasil Konversi & Unduh
|--------------------------------------------------------------------------
*/
// Halaman Pratinjau (Preview) Hasil
Route::get('/preview/{id}', [ConverterController::class, 'preview'])->name('converter.preview');
// Fitur Unduh File
Route::get('/download/{id}', [ConverterController::class, 'download'])->name('converter.download');


/*
|--------------------------------------------------------------------------
| Riwayat & Detail Analisis AI
|--------------------------------------------------------------------------
*/
// Daftar Semua Riwayat
Route::get('/history', [ConverterController::class, 'history'])->name('converter.history');
// Detail Laporan AI dari Riwayat
Route::get('/history/{id}', [ConverterController::class, 'show'])->name('converter.show');
