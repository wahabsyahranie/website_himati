<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use App\Filament\Resources\PengurusResource;
use App\HandlesDepartemen;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengurus extends EditRecord
{
    use HandlesDepartemen;
    protected static string $resource = PengurusResource::class;
    protected $departemens = [];

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->departemens = $data['departemen'] ?? [];
        return $data;
    }

    protected function afterSave(): void {
        $this->syncDepartemens($this->record, $this->departemens);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
