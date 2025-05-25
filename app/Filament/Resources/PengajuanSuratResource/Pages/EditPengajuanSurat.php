<?php

namespace App\Filament\Resources\PengajuanSuratResource\Pages;

use Filament\Actions;
use App\Models\Struktur;
use App\Models\PengajuanSurat;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PengajuanSuratResource;

class EditPengajuanSurat extends EditRecord
{
    protected static string $resource = PengajuanSuratResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //FUNGSI EDIT DATA SEBELUM DITAMPILKAN
    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (!empty($data['detail_surat']) && is_array($data['detail_surat'])) {
            $detail = $data['detail_surat'];

            $data['nama_kegiatan'] = $detail['nama_kegiatan'] ?? null;
            $data['tanggal_pelaksana'] = $detail['tanggal_pelaksana'] ?? null;
            $data['waktu_pelaksana'] = $detail['waktu_pelaksana'] ?? null;
            $data['tujuan_kegiatan'] = $detail['tujuan_kegiatan'] ?? null;
            $data['tanggal_selesai'] = $detail['tanggal_selesai'] ?? null;
            $data['waktu_selesai'] = $detail['waktu_selesai'] ?? null;
            $data['tempat_pelaksana'] = $detail['tempat_pelaksana'] ?? null;
            $data['nama_cp'] = $detail['nama_cp'] ?? null;
            $data['nomor_cp'] = $detail['nomor_cp'] ?? null;
            $data['lampiran'] = $detail['lampiran'] ?? null;
        }

        return $data;
    }

    //FUNGSI EDIT DATA SEBELUM DISIMPAN
    protected function mutateFormDataBeforeSave(array $data): array
    {

        //mengambil nomor surat saat ini.
        $cek_baris_terakhir = PengajuanSurat::find($this->data['id']);

        if(!empty($cek_baris_terakhir)){
            $getNomor = $cek_baris_terakhir->nomor_surat;
            $getTipe = $cek_baris_terakhir->struktur->kode;
            $pisahkan = explode('/', $getNomor);
            $nomor_sekarang= (int) $pisahkan[0];
            
            if($getTipe != 'BPI'){
                $bulan_sekarang = $pisahkan[4];
                $tahun_sekarang = $pisahkan[5];
            } else {
                $bulan_sekarang = $pisahkan[3];
                $tahun_sekarang = $pisahkan[4];
            }
        } else {
            $nomor_sekarang = 1;
            $bulan_sekarang = now()->month;
            $tahun_sekarang = now()->year;
        }

        //AMBIL ATRIBUT YANG DIBUTUHKAN
        $type_after = $data['tipe_surat'];
        $organisasi = 'HIMA-TI';

        //SET NOMOR SURAT
        $struktur = Struktur::find($data['struktur_id']);
        $dept = $struktur->kode;
        if($dept !== 'BPI'){
            $nos_final = $nomor_sekarang . '/' . $type_after . '/' . $organisasi . '/' . $dept . '/' . $bulan_sekarang . '/' . $tahun_sekarang;
            $data['nomor_surat'] = $nos_final;
        } else {
            $nos_final = $nomor_sekarang . '/' . $type_after . '/' . $organisasi . '/' . $bulan_sekarang . '/' . $tahun_sekarang;
            $data['nomor_surat'] = $nos_final;
        }
        
        //SET SLUG
        $slug = $data['nomor_surat'];
        $slug_baru = str_replace('/', '-', $slug);
        $data['slug'] = $slug_baru;

        $user = auth()->id();
        $data['user_id'] = $user;

        ////SET DETAIL SURAT
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

        $detail = [];

        foreach ($fields as $field) {
            if (!empty($data[$field])) {
                $detail[$field] = $data[$field];
                unset($data[$field]);
            }
        }
        
        $data['detail_surat'] = $detail;
        
        //HAPUS LAMPIRAN YANG BERNILAI NULL
        if(!empty($detail['lampiran'])){
            foreach ($detail['lampiran'] as &$anggota) {
                $anggota = array_filter($anggota, fn($value) => !is_null($value));
            }
        }
        
        return $data;
    }
}
