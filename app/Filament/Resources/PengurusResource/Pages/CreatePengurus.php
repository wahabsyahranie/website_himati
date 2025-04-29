<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengurusResource;
use App\HandlesDepartemen;
use App\Models\DetailPengurus;
use Filament\Support\Exceptions\Halt;

class CreatePengurus extends CreateRecord
{
    use HandlesDepartemen;

    protected static string $resource = PengurusResource::class;
    protected $departemens = [];
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->departemens = $data['departemen'] ?? [];
        return $data;
    }

    protected function afterCreate(): void {
        $this->syncDepartemens($this->record, $this->departemens);
    }
}
