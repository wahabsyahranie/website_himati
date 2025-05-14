<?php

namespace App\Filament\Resources\DepartemenResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\DepartemenResource;

class EditDepartemen extends EditRecord
{
    protected static string $resource = DepartemenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $departemen = static::getRecord();

        if ($departemen && isset($data['gambar']) && $data['gambar'] !== $departemen->gambar) {
            if ($departemen->gambar && Storage::disk('public')->exists($departemen->gambar)) {
                Storage::disk('public')->delete($departemen->gambar);
            }
        }

        return $data;
    }
}
