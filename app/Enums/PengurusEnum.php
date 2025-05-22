<?php

namespace App\Enums;

enum PengurusEnum: string
{
    case KetuaUmum = 'ketua_umum';
    case WakilKetuaUmum = 'wakil_ketua_umum';
    case BendaharaUmum = 'bendahara_umum';
    case KepalaDepartemen = 'kepala_departemen';
    case SekretarisDepartemen = 'sekretaris_departemen';
    case AnggotaDepartemen = 'anggota_departemen';

    public function label(): string
    {
        return str_replace('_', ' ', ucwords($this->value, '_'));
    }

}
