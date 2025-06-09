<?php

namespace App\Filament\Resources\PengesahanResource\Pages;

use App\Filament\Resources\PengesahanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengesahans extends ListRecords
{
    protected static string $resource = PengesahanResource::class;
    protected static ?string $title = 'Data Tanda Tangan';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
