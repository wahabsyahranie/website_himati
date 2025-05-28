<?php

namespace App\Filament\Resources\TandatanganDigitalResource\Pages;

use App\Filament\Resources\TandatanganDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTandatanganDigital extends EditRecord
{
    protected static string $resource = TandatanganDigitalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
