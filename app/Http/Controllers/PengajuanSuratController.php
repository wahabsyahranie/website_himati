<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PengajuanSuratController extends Controller
{
    public function show($slug)
    {
        $data = PengajuanSurat::where('slug', $slug)->firstOrFail();
        return view('surat', compact('data'));
    }
}