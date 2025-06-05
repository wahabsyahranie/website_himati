<?php

namespace App\Filament\Exports;

use App\Models\Pengurus;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;

class PengurusExporter extends Exporter
{
    protected static ?string $model = Pengurus::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')
                ->label('nama'),
            ExportColumn::make('user.mahasiswa.nim')
                ->label('nim'),
            ExportColumn::make('nomor_induk')
                ->label('nomor_induk'),
            ExportColumn::make('jabatan')
                ->label('jabatan')
                ->formatStateUsing(fn($state) => $state?->label() ?? '-'),
            ExportColumn::make('struktur.nama_lengkap')
                ->label('departemen'),
            ExportColumn::make('periode')
                ->label('periode'),
            ExportColumn::make('status')
                ->label('status'),
        ];
    }

    public function getFormats(): array
    {
        return [
            ExportFormat::Csv,
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your pengurus export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
