<?php

use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanSuratController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/surat/{slug}', [PengajuanSuratController::class, 'show'])->name('surat.show');
