<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Departemen;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getData()
    {
        $dataPengaduan = Pengaduan::where('status', 'dipublikasikan')->orderBy('created_at', 'desc')->limit(4)->get();
        $countPengaduan = Pengaduan::count();
        $countSurat = PengajuanSurat::count();
        $dataDepartemen = Departemen::orderBy('prioritas', 'asc')->get();

        $cards = [];
        foreach ($dataPengaduan as $pengaduan) {
            $tujuan = $pengaduan->tujuan;
            if ($tujuan == 'dosen') {
                $colorCard = 'yellow';
                $colorText = 'text-secondary';
            } elseif ($tujuan == 'hmj ti') {
                $colorCard = 'primary';
                $colorText = 'text-primary';
            } elseif ($tujuan == 'jurusan') {
                $colorCard = 'green';
                $colorText = 'text-primary';
            } else {
                $colorCard = 'yellow';
                $colorText = 'text-secondary';
            }
    
            $cards[] = [
                'colorCard' => $colorCard,
                'colorText' => $colorText,
            ];
        }

        return compact('dataPengaduan' , 'dataDepartemen', 'countPengaduan', 'countSurat', 'cards');

        
    }

    public function index()
    {
        $datas = $this->getData();
        return view('mulai', compact('datas'));
    }

    public function advokasi()
    {
        $datas = $this->getData();
        return view('advokasi',  compact('datas'));
    }
}
