<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/surat'); // Redirect ke halaman surat
});

// Routes untuk Surat
Route::resource('surat', SuratController::class);
Route::get('/surat-search', [SuratController::class, 'search'])->name('surat.search');

// Routes untuk Kategori
Route::resource('kategori', KategoriController::class);
Route::get('/kategori-search', [KategoriController::class, 'search'])->name('kategori.search'); // TAMBAH INI

// Route untuk About
Route::get('/about', function () {
    return view('about');
})->name('about');