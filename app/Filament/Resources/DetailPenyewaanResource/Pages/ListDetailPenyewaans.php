<?php

namespace App\Filament\Resources\DetailPenyewaanResource\Pages;

use App\Filament\Resources\DetailPenyewaanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailPenyewaans extends ListRecords
{
    protected static string $resource = DetailPenyewaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
