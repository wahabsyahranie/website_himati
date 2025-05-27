<?php

namespace App\Filament\Resources\PengesahanResource\Pages;

use App\Filament\Resources\PengesahanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePengesahan extends CreateRecord
{
    protected static string $resource = PengesahanResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        return $data;
    }
}
