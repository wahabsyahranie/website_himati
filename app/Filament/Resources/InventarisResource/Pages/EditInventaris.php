<?php

namespace App\Filament\Resources\InventarisResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\InventarisResource;

class EditInventaris extends EditRecord
{
    protected static string $resource = InventarisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $produk = static::getRecord();
        // dd($produk);

        if ($produk && isset($data['gambar']) && $data['gambar'] !== $produk->gambar) {
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }
        }

        return $data;
    }
}
