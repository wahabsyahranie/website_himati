<?php

use App\Http\Controllers\HomeController;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanSuratController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/surat/{slug}', [PengajuanSuratController::class, 'show'])->name('surat.show');

Route::get('/surat/unduh/{slug}', [PengajuanSuratController::class, 'unduh'])->name('surat.unduh');
