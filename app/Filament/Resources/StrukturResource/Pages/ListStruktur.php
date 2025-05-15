<?php

namespace App\Filament\Resources\StrukturResource\Pages;

use App\Filament\Resources\StrukturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStruktur extends ListRecords
{
    protected static string $resource = StrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
