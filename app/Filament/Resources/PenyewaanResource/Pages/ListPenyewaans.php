<?php

namespace App\Filament\Resources\PenyewaanResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PenyewaanResource;
use App\Filament\Resources\PenyewaanResource\Widgets\PenyewaanOverview;

class ListPenyewaans extends ListRecords
{
    protected static string $resource = PenyewaanResource::class;
    protected static ?string $title = 'Daftar Permintaan Sewa Inventaris';

    //MEMBUAT WIDGET
    protected function getHeaderWidgets(): array
    {
        return [
            PenyewaanOverview::class,
        ];
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
