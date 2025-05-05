<?php

namespace App\Filament\Resources\KegiatanResource\Pages;

use Filament\Actions;
use App\Models\Kegiatan;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\KegiatanResource;
use App\Filament\Widgets\KegiatanResourceAbsenWidget;

class EditKegiatan extends EditRecord
{
    protected static string $resource = KegiatanResource::class;
    
    // protected function getFooterWidgets(): array
    // {
    //     return [
    //         KegiatanResourceAbsenWidget::make()
    //     ];
    // }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
