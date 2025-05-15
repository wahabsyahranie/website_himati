<?php

namespace App\Filament\Imports;

use App\Models\Pengurus;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PengurusImporter extends Importer
{
    protected static ?string $model = Pengurus::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nomor_induk')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('jabatan')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('periode')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('user_id')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('departemen')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('created_at')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Pengurus
    {
        // return Pengurus::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Pengurus();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your pengurus import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
