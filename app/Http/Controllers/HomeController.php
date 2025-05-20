<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Struktur;
use App\Models\Pengaduan;
use App\Models\Inventaris;
use Illuminate\Http\Request;

use App\Models\PengajuanSurat;
use function Pest\Laravel\get;

class HomeController extends Controller
{
    private function getData()
    {
        $dataReview = Review::with('pengurus.user')->where('status', 'ditampilkan')->limit(4)->get();
        $dataPengaduan = Pengaduan::where('status', 'dipublikasikan')->orderBy('created_at', 'desc')->limit(4)->get();
        $countPengaduan = Pengaduan::count();
        $countSurat = PengajuanSurat::count();
        $dataStruktur = Struktur::orderBy('prioritas', 'asc')->get();

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

        return compact('dataPengaduan' , 'dataStruktur', 'countPengaduan', 'countSurat', 'cards', 'dataReview');

        
    }

    public function index()
    {
        $datas = $this->getData();
        return view('mulai', compact('datas'));
    }

    public function advokasi(Pengaduan $pengaduan)
    {
        $datas = Pengaduan::where('status', 'dipublikasikan')->orderBy('created_at', 'desc')->limit(4)->get();
        $collects =[];
        foreach($datas as $data){
            $get = $data->slug;
            if($get !== $pengaduan->slug){
                $collects[] = $data;
            }
        }
        // dd($collects);
        return view('advokasi',  compact('pengaduan', 'collects'));
    }

    public function produk()
    {
        $datas = Inventaris::where('status', 'tersedia')->get();
        return view('produk', compact('datas'));
    }
}
