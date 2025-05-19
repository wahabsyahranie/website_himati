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
        $data = PengajuanSurat::where('slug', $slug)->firstOrFail(); //
        $pengesahanInfo = []; //

        //MENGAMBIL DATA UNTUK TUJUAN SURAT (KEPADA YTH.)

        $tandaTangan = $data->tandatangan;
        $tujuan = $data->pengesahan_id;
        $search_jabatan = \App\Models\Pengesahan::where('id', $tujuan)->first();
        $found_jabatan = $search_jabatan->jabatan;
        $found_bidang = $search_jabatan->bidang;
        $tujuan_after = $found_jabatan . ' ' . $found_bidang; //

        //MENGAMBIL DATA DARI MODEL PENGESAHAN
        foreach ($tandaTangan as $id) {
            $pengesahan = \App\Models\Pengesahan::where('id', $id)->orderBy('prioritas')->first();
            if ($pengesahan) {
                $pengesahanInfo[$id] = [
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

    //FUNGSI MENENTUKAN VIEW
    private function getView($tipe)
    {
        $mapView = [
            'Und' => 'surat_undangan',
            'SIk' => 'surat_izin_kegiatan',
            'SPm' => 'surat_peminjaman',
            'SM' => 'surat_mandat'
        ];

        return $mapView[$tipe] ?? abort(404, 'Tipe surat tidak dikenali.');
    }

    //FUNGSI MELIHAT SURAT
    public function show($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $tipe = $data['data']->tipe_surat;
        $namaView = $this->getView($tipe);

        $pdf = Pdf::loadView($namaView, $data);
        return $pdf->stream($data['data']->slug . '.pdf');
    }

    //FUNGSI MENDOWNLOAD SURAT
    public function unduh($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $tipe = $data['data']->tipe_surat;
        $namaView = $this->getView($tipe);

        $pdf = Pdf::loadView($namaView, $data);
        return $pdf->loadView($data['data']->slug . '.pdf');
    }

    // public function test($slug)
    // {
    //     $data = $this->getDataPengesahan($slug);
    //     $nama_file = $data['data']->slug;
    //     $pdf = Pdf::loadView('surat_mandat', $data);
    //     return $pdf->stream($nama_file . ".pdf");
    // }

    

    //// Fungsi Mengunduh Surat dengan SpatieBrowserShoot
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