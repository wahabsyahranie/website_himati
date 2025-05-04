<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
// use Spatie\Browsershot\Browsershot;

class PengajuanSuratController extends Controller
{

    //FUNGSI MENGAMBIL DATA
    private function getDataPengesahan($slug)
    {
        $data = PengajuanSurat::where('slug', $slug)->firstOrFail();
        $tandaTangan = $data->tandatangan;
        $pengesahanInfo = [];

        //MENGAMBIL DATA UNTUK TUJUAN SURAT (KEPADA YTH.)
        $tujuan = $data->pengesahan_id;
        $search_jabatan = \App\Models\Pengesahan::where('id', $tujuan)->first();
        $found_jabatan = $search_jabatan->jabatan;
        $found_bidang = $search_jabatan->bidang;
        $tujuan_after = $found_jabatan . ' ' . $found_bidang;

        //MENGAMBIL DATA DARI MODEL PENGESAHAN
        foreach ($tandaTangan as $nama) {
            $pengesahan = \App\Models\Pengesahan::where('nama', $nama)->orderBy('prioritas')->first();
            if ($pengesahan) {
                $pengesahanInfo[$nama] = [
                    'jabatan' => $pengesahan->jabatan,
                    'nomor_induk' => $pengesahan->nomor_induk,
                    'bidang' => $pengesahan->bidang,
                    'nama' => $pengesahan->nama,
                    'prioritas' => $pengesahan->prioritas,
                    'type_nomor_induk' => $pengesahan->type_nomor_induk
                ];
            }
        }

        //MENGURUTKAN DATA BERDASARKAN PRIORITAS DARI BESAR KE KECIL
        usort($pengesahanInfo, function ($a, $b) {
            return $b['prioritas'] <=> $a['prioritas'];
        });

        //MENGEMBALIKAN DATA
        return compact('data', 'pengesahanInfo', 'tujuan_after');
    }

    //Fungsi Melihat Surat
    public function show($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $pdf = Pdf::loadView('surat_unduh', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function unduh($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $nama_file = $data['data']->slug;
        $pdf = Pdf::loadView('surat_unduh', $data);
        return $pdf->download($nama_file . ".pdf");
    }

    //Fungsi Mengunduh Surat dengan SpatieBrowserShoot
    // public function unduh($slug)
    // {
    //     $data = $this->getDataSurat($slug);
    //     $template = view('surat', $data)->render();

    //     // Path node & npm sesuai hasil `which node` & `which npm`
    //     Browsershot::html($template)
    //         ->setNodeBinary('/Users/sitikoyimatun/Library/Application\ Support/Herd/config/nvm/versions/node/v22.14.0/bin/node')
    //         ->setNpmBinary('/Users/sitikoyimatun/Library/Application\ Support/Herd/config/nvm/versions/node/v22.14.0/bin/npm')
    //         ->setOption('args', ['--no-sandbox'])
    //         ->format('A4')
    //         ->savePdf(storage_path('app/public/surat-' . $slug . '.pdf'));

    //     return response()->download(storage_path('app/public/surat-' . $slug . '.pdf'));
    // }


}