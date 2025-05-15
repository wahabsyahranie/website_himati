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
            ExportColumn::make('id')
                ->label('id'),
            ExportColumn::make('nomor_induk')
                ->label('nomor_induk'),
            ExportColumn::make('jabatan')
                ->label('jabatan'),
            ExportColumn::make('periode')
                ->label('periode'),
            ExportColumn::make('user_id')
                ->label('user_id'),
            ExportColumn::make('departemen')
                ->label('departemen'),
            ExportColumn::make('status')
                ->label('status'),
            ExportColumn::make('created_at')
                ->label('created_at'),
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
