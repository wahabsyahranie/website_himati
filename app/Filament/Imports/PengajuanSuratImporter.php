<?php

namespace App\Filament\Imports;

use App\Models\PengajuanSurat;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PengajuanSuratImporter extends Importer
{
    protected static ?string $model = PengajuanSurat::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('type')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nomor_surat')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('lampiran')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('perihal')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('isi')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('tanggal_pelaksana')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('tanggal_selesai')
                ->rules(['date']),
            ImportColumn::make('waktu_pelaksana')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('waktu_selesai')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('tempat_pelaksana')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nama_cp')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nomor_cp')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('slug')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('tandatangan'),
            ImportColumn::make('user_id')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('departemen_id')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('user_id')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('pengesahan_id')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?PengajuanSurat
    {
        // return PengajuanSurat::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new PengajuanSurat();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your pengajuan surat import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
