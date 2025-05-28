<?php

namespace App\Filament\Resources\TandatanganDigitalResource\Pages;

use App\Filament\Resources\TandatanganDigitalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTandatanganDigitals extends ListRecords
{
    protected static string $resource = TandatanganDigitalResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
