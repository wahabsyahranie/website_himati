<?php

namespace App\Filament\Resources\TandatanganDigitalResource\Pages;

use Filament\Actions;
use App\Models\TandatanganDigital;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TandatanganDigitalResource;

class ListTandatanganDigitals extends ListRecords
{
    protected static string $resource = TandatanganDigitalResource::class;
    protected static ?string $title = 'Permintaan Tanda Tangan';

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }

    public function getTableQuery(): Builder
    {
        return TandatanganDigital::query()
            ->with([
                'pengesahans.sumberable.user',
                'pengajuan_surats'
            ]);
    }
}
