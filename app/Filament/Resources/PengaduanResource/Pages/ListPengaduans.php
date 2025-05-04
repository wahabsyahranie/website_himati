<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PengaduanResource;
use App\Filament\Resources\PengaduanResource\Widgets\PengaduanOverview;

class ListPengaduans extends ListRecords
{
    protected static string $resource = PengaduanResource::class;
    protected static ?string $title = 'Daftar Pengaduan';

    //MEMBUAT WIDGET
    protected function getHeaderWidgets(): array
    {
        return [
            PengaduanOverview::class,
        ];
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
