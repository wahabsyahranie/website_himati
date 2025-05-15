<?php

use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\PengajuanSuratController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/advokasi/{pengaduan:slug}', [HomeController::class, 'advokasi']);

Route::get('/produk', [HomeController::class, 'produk']);

Route::get('/surat/{slug}', [PengajuanSuratController::class, 'show'])->name('surat.show');

Route::get('/surat/unduh/{slug}', [PengajuanSuratController::class, 'unduh'])->name('surat.unduh');

Route::get('/test/{slug}', [PengajuanSuratController::class, 'testing']);

Route::get('/send/{id}', [SendController::class, 'send'])->name('kegiatan.send');


