<?php

namespace App\Filament\Resources\PengaduanResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PengaduanResource;

class EditPengaduan extends EditRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $advokasi = static::getRecord();

        if ($advokasi && isset($data['gambar']) && $data['gambar'] !== $advokasi->gambar) {
            if ($advokasi->gambar && Storage::disk('public')->exists($advokasi->gambar)) {
                Storage::disk('public')->delete($advokasi->gambar);
            }
        }

        return $data;
    }
}
