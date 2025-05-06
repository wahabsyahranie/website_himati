<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Departemen;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getData()
    {
        $dataPengaduan = Pengaduan::where('status', 'dipublikasikan')->orderBy('created_at', 'desc')->limit(3)->get();
        $dataDepartemen = Departemen::orderBy('prioritas', 'asc')->get();
        
        return compact('dataPengaduan' , 'dataDepartemen');

        
    }

    public function index()
    {
        $datas = $this->getData();
        return view('home', compact('datas'));
    }
}
