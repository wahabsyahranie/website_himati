<?php

namespace App\Filament\Resources\PengurusResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PengurusResource;
use App\Models\DetailPengurus;
use Filament\Support\Exceptions\Halt;

class CreatePengurus extends CreateRecord
{
    protected static string $resource = PengurusResource::class;

    protected $departemens = [];
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $this->departemens = $data['departemen'] ?? [];
        return $data;
    }

    protected function afterCreate(): void {
        $penguruses_id = $this->record->id;
        foreach ($this->departemens as $departemen) {
            DetailPengurus::create([
                'penguruses_id' => $penguruses_id,
                'departemen' => $departemen,
            ]);
        }
    }
}
