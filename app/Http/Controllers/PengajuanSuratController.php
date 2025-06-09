<?php

namespace App\Http\Controllers;

use App\Models\PengajuanSurat;
use Barryvdh\DomPDF\Facade\Pdf;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\ValidationException;

class PengajuanSuratController extends Controller
{
    //FUNGSI MENGAMBIL DATA
    private function getDataPengesahan($slug)
    {
        $data = PengajuanSurat::where('slug', $slug)->firstOrFail();


        ////MODIFIKASI ARRAY DETAIL_SURAT
        $fields = [
            'nama_kegiatan',
            'tujuan_kegiatan',
            'tanggal_pelaksana',
            'tanggal_selesai',
            'waktu_pelaksana',
            'waktu_selesai',
            'tempat_pelaksana',
            'nama_cp',
            'nomor_cp',
            'lampiran',
        ];

        $detail_surat = [];
        foreach ($fields as $field) {
            if (!empty($data->detail_surat[$field])) {
                $detail_surat[$field] = $data->detail_surat[$field];
                unset($data[$field]);
            }
        }


        $pengesahanInfo = []; //

        //MENGAMBIL DATA UNTUK TUJUAN SURAT (KEPADA YTH.)
        $tujuan = $data->tujuan_surat;  
        $tujuan_after = $tujuan->tujuan;

        //MENGAMBIL DATA DARI MODEL PENGESAHAN
        $ttd = $data->tandatangan_digitals;
        foreach ($ttd as $id) {
            $pengesahan = \App\Models\Pengesahan::where('id', $id->pengesahan_id)->orderBy('prioritas')->first();
            if ($pengesahan) {
                $pengesahanInfo[$id->id] = [
                    'jabatan' => $pengesahan->jabatan,
                    'nama' => $pengesahan->sumberable->user->name,
                    'prioritas' => $pengesahan->prioritas,
                ];
                if ($pengesahan->sumberable_type === 'App\Models\Pengurus') {
                    $pengesahanInfo[$id->id]['nomor_induk'] = $pengesahan->sumberable?->user?->mahasiswa?->nim ?? '-';
                    $pengesahanInfo[$id->id]['type_nomor_induk'] = 'NIM';
                } elseif ($pengesahan->sumberable_type === 'App\Models\Dosen') {
                    $pengesahanInfo[$id->id]['nomor_induk'] = $pengesahan->sumberable?->nip ?? '-';
                    $pengesahanInfo[$id->id]['type_nomor_induk'] = 'NIP';
                }

                //TANDATANGAN DIGITAL
                if ($id->status === 'disetujui') {
                    $writer = new PngWriter();

                    // Create QR code
                    $qrCode = new QrCode(
                        data: 'http://himati.test/' . $id->nomor_registrasi,
                        encoding: new Encoding('UTF-8'),
                        errorCorrectionLevel: ErrorCorrectionLevel::Low,
                        size: 300,
                        margin: 10,
                        roundBlockSizeMode: RoundBlockSizeMode::Margin,
                        foregroundColor: new Color(0, 0, 0),
                        backgroundColor: new Color(255, 255, 255)
                    );

                    // Create generic logo
                    $logo = new Logo(
                        path: public_path('img/hmjti/logo_hmjti_white.png'),
                        resizeToWidth: 100,
                        punchoutBackground: false
                    );

                    // Create generic label
                    $label = new Label(
                        text: 'Label',
                        textColor: new Color(255, 0, 0)
                    );

                    $result = $writer->write($qrCode, $logo);
                    $pengesahanInfo[$id->id]['ttdDigital'] = base64_encode($result->getString());

                } elseif ($id->status != 'disetujui'){
                     $pengesahanInfo[$id->id]['ttdDigital'] = null;
                }
            }
        };

        //MENGURUTKAN DATA BERDASARKAN PRIORITAS DARI BESAR KE KECIL
        usort($pengesahanInfo, function ($a, $b) {
            return $b['prioritas'] <=> $a['prioritas'];
        });

        //MENGEMBALIKAN DATA
        return compact('data', 'pengesahanInfo', 'tujuan_after', 'detail_surat');
    }

    //FUNGSI MENENTUKAN VIEW
    private function getView($tipe)
    {
        $mapView = [
            'Und' => 'surat_undangan',
            'SIk' => 'surat_izin_kegiatan',
            'SPm' => 'surat_peminjaman',
            'SM' => 'surat_mandat',
            'Spm' => 'surat_dispen',
            'Spn' => 'surat_pernyataan',
            'SRe' => 'surat_rekomendasi',
            'Und' => 'surat_undangan',
        ];

        return $mapView[$tipe] ?? abort(404, 'Tipe surat tidak dikenali.');
    }

    //FUNGSI MELIHAT SURAT
    public function show($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $tipe = $data['data']->tipe_surat;
        $namaView = $this->getView($tipe);

        $pdf = Pdf::loadView('pdf.' . $namaView, $data);
        return $pdf->stream($data['data']->slug . '.pdf');
    }

    //FUNGSI MENDOWNLOAD SURAT
    public function unduh($slug)
    {
        $data = $this->getDataPengesahan($slug);
        $tipe = $data['data']->tipe_surat;
        $namaView = $this->getView($tipe);

        $pdf = Pdf::loadView('pdf.' . $namaView, $data);
        return $pdf->download($data['data']->slug . '.pdf');
    }

    // public function test($slug)
    // {
    //     $data = $this->getDataPengesahan($slug);
    //     $tipe = $data['data']->tipe_surat;
    //     $namaView = $this->getView($tipe);

    //     $pdf = Pdf::loadView('pdf.' . $namaView, $data);
    //     return $pdf->stream($data['data']->slug . '.pdf');
    // }

}