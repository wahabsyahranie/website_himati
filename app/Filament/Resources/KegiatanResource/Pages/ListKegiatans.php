<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\KegiatanResource;
use App\Filament\Widgets\StatsOverviewWidget;

class ListKegiatans extends ListRecords
{
    protected static string $resource = KegiatanResource::class;
    protected static ?string $title = 'Daftar Kegiatan';

    
    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
