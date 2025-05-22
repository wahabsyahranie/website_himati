<?php

namespace App\Enums;

enum KegiatanEnum: string
{
    case RapatUmum = 'rapat_umum';
    case RapatPanitia = 'rapat_panitia';
    case ProkerPrimer = 'proker_primer';
    case ProkerSekunder = 'proker_sekunder';

    public function label(): string
    {
        return str_replace('_', ' ', ucwords($this->value, '_'));
    }
}
