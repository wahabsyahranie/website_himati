<?php

namespace App\Filament\Resources\PengajuanSuratResource\Pages;

use Filament\Actions;
use App\Models\Struktur;
use App\Models\PengajuanSurat;
use Filament\Support\Exceptions\Halt;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengajuanSuratResource;

class CreatePengajuanSurat extends CreateRecord
{
    protected static string $resource = PengajuanSuratResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $type_after = $data['tipe_surat'];
        $organisasi = 'HIMA-TI';
        $tahun = now()->year;
        $bulan = now()->month;

        //konversi angka bulan ke romawi
        $bulan_romawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ];
        $romawi = $bulan_romawi[$bulan];

        //mengambil nomor surat terakhir dari database dan increment
        $cek_baris_terakhir = PengajuanSurat::latest()->first();
        if ($cek_baris_terakhir && $cek_baris_terakhir->nomor_surat) {
            $cek_nomor_terakhir = $cek_baris_terakhir->nomor_surat;

            $pisahkan = explode('/', $cek_nomor_terakhir);
            $nomor_terakhir = (int) $pisahkan[0];
            $nomor_baru = $nomor_terakhir + 1;
        } else {
            $nomor_baru = 131;
        }

        //set nomor surat
        $struktur = Struktur::find($data['struktur_id']);
        $dept = $struktur->kode;
        if($dept !== 'BPI'){
            $nos_final = $nomor_baru . '/' . $type_after . '/' . $organisasi . '/' . $dept . '/' . $romawi . '/' . $tahun;
            $data['nomor_surat'] = $nos_final;
        } else {
            $nos_final = $nomor_baru . '/' . $type_after . '/' . $organisasi . '/' . $romawi . '/' . $tahun;
            $data['nomor_surat'] = $nos_final;
        }
        
        // mengatur slug
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

        $detailSurat = [];

        foreach ($fields as $field) {
            if (!empty($data[$field])) {
                $detailSurat[$field] = $data[$field];
                unset($data[$field]);
            }
        }
        
        $data['detail_surat'] = $detailSurat;
        
        //HAPUS LAMPIRAN YANG BERNILAI NULL
        $detail = $data['detail_surat'];
        if(!empty($detail['lampiran'])){
            foreach ($detail['lampiran'] as &$anggota) {
                $anggota = array_filter($anggota, fn($value) => !is_null($value));
            }
        }

        // dd($data);
        
        return $data;
    }
}
