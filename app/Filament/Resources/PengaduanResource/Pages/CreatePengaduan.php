<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use App\Filament\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengaduan extends CreateRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $slug = $data['judul'];
        $slug_baru = str_replace(' ', '-', $slug);
        $data['slug'] = $slug_baru;

        $user = auth()->id();
        $data['user_id'] = $user;

        return $data;
    }
}
