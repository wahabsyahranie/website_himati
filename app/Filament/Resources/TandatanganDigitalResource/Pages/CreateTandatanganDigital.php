<?php

namespace App\Filament\Resources\TandatanganDigitalResource\Pages;

use App\Filament\Resources\TandatanganDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTandatanganDigital extends CreateRecord
{
    protected static string $resource = TandatanganDigitalResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // $data['nomor_registrasi'] = '17559759';

        return $data;
    }
}
