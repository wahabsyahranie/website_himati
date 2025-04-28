<?php

namespace App\Filament\Resources\DetailPenyewaanResource\Pages;

use App\Filament\Resources\DetailPenyewaanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailPenyewaan extends EditRecord
{
    protected static string $resource = DetailPenyewaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
