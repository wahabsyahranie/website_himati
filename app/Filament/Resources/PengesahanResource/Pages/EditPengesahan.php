<?php

namespace App\Filament\Resources\PengesahanResource\Pages;

use App\Filament\Resources\PengesahanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengesahan extends EditRecord
{
    protected static string $resource = PengesahanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
