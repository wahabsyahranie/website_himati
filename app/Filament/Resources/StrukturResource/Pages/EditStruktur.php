<?php

namespace App\Filament\Resources\StrukturResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\StrukturResource;

class EditStruktur extends EditRecord
{
    protected static string $resource = StrukturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $struktur = static::getRecord();

        if ($struktur && isset($data['gambar']) && $data['gambar'] !== $struktur->gambar) {
            if ($struktur->gambar && Storage::disk('public')->exists($struktur->gambar)) {
                Storage::disk('public')->delete($struktur->gambar);
            }
        }

        return $data;
    }
}
