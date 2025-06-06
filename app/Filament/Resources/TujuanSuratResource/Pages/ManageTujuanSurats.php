<?php

namespace App\Filament\Resources\TujuanSuratResource\Pages;

use App\Filament\Resources\TujuanSuratResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTujuanSurats extends ManageRecords
{
    protected static string $resource = TujuanSuratResource::class;
    protected static ?string $title = 'Daftar Tujuan Surat';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
