<?php

namespace App\Filament\Resources\PenyewaanResource\Pages;

use App\Filament\Resources\PenyewaanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePenyewaan extends CreateRecord
{
    protected static string $resource = PenyewaanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $nomorPesanan = 'PE-' . date('Ymd') . '-' . rand(1000000, 9999000);
        $data['nomor_pesanan'] = $nomorPesanan;
        return $data;
    }

}
