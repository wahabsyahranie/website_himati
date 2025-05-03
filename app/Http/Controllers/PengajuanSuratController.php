<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;
// use Spatie\Browsershot\Browsershot;

class PengajuanSuratController extends Controller
{
    //Mengambil semua Data yang dibutuhkan
    private function getDataSurat($slug)
    {
        $data = PengajuanSurat::where('slug', $slug)->firstOrFail();

        $departemenMap = [
            'Kpm' => ['Kepala Departemen', 'KPSDM', 'M. Fikri Permana', '236152003'],
            'Agm' => ['Kepala Departemen', 'Keagamaan', 'M. Rojaky', '236152003'],
            'Min' => ['Kepala Departemen', 'Minat dan Bakat', 'Davien', '236152003'],
            'Hum' => ['Kepala Departemen', 'Humas dan Media', 'M. Fikri Permana', '236152003'],
            'Rt' => ['Kepala Departemen', 'Riset dan Teknologi', 'M. Fikri Permana', '236152003'],
            'Dan' => ['Kepala Departemen', 'Dana dan Usaha', 'Lala Yunda', '236152003'],
        ];

        $tandatangan = $data->tandatangan;
        $dosenInfo = [];
        foreach ($tandatangan as $nama) {
            $dosen = \App\Models\Dosen::where('nama', $nama)->first();
            if ($dosen) {
                $dosenInfo[$nama] = [
                    'jabatan' => $dosen->jabatan,
                    'nip' => $dosen->nip
                ];
            }
        }

        return compact('data', 'departemenMap', 'dosenInfo');
    }

    //Fungsi Melihat Surat
    public function show($slug)
    {
        $data = $this->getDataSurat($slug);
        $pdf = Pdf::loadView('surat_unduh', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function unduh($slug)
    {
        $data = $this->getDataSurat($slug);
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