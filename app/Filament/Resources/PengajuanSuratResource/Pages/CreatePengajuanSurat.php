<?php

namespace App\Filament\Resources\PengajuanSuratResource\Pages;

use Filament\Actions;
use App\Models\PengajuanSurat;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengajuanSuratResource;
use Filament\Support\Exceptions\Halt;

class CreatePengajuanSurat extends CreateRecord
{
    protected static string $resource = PengajuanSuratResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $type_after = $data['type'];
        $dept = $data['departemen'];
        $organisasi = 'HIMA-TI';
        $tahun = now()->year;
        $bulan = now()->month;

        //konversi angka bulan ke romawi
        $bulan_romawi = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII',
        ];
        $romawi = $bulan_romawi[$bulan];

        //nomor surat otomatis
        $cek_baris_terakhir = PengajuanSurat::latest()->first();
        if ($cek_baris_terakhir && $cek_baris_terakhir->nomor_surat) {
            $cek_nomor_terakhir = $cek_baris_terakhir->nomor_surat;

            $pisahkan = explode('/', $cek_nomor_terakhir);
            $nomor_terakhir = (int) $pisahkan[0];
            $nomor_baru = $nomor_terakhir + 1;
        } else {
            $nomor_baru = 1;
        }

        //set nomor surat
        $nos_final = $nomor_baru . '/' . $type_after . '/' . $organisasi . '/' . $dept . '/' . $romawi . '/' . $tahun;
        $data['nomor_surat'] = $nos_final;

        //mengatur slug
        $slug = $data['nomor_surat'];
        $slug_baru = str_replace('/', '-', $slug);
        $data['slug'] = $slug_baru;

        return $data;
    }
}
