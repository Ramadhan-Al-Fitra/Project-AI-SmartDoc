<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConverterController;

Route::get('/', [ConverterController::class, 'index'])->name('home');
Route::post('/upload', [ConverterController::class, 'upload'])->name('converter.upload');
Route::get('/processing/{id}', [ConverterController::class, 'processing'])->name('converter.processing');
Route::get('/process_complete/{id}', [ConverterController::class, 'process_complete'])->name('converter.process_complete');
Route::get('/preview/{id}', [ConverterController::class, 'preview'])->name('converter.preview');
Route::get('/download/{id}', [ConverterController::class, 'download'])->name('converter.download');
Route::get('/history', [ConverterController::class, 'history'])->name('converter.history');
