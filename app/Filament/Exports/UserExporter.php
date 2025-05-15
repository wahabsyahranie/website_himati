<?php

namespace App\Filament\Exports;

use App\Models\User;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;

class UserExporter extends Exporter
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('id'),
            ExportColumn::make('nim')
                ->label('nim'),
            ExportColumn::make('name')
                ->label('name'),
            ExportColumn::make('tahun_masuk')
                ->label('tahun_masuk'),
            ExportColumn::make('nomor_telepon')
                ->label('nomor_telepon'),
            ExportColumn::make('prodi')
                ->label('prodi'),
            ExportColumn::make('email')
                ->label('email'),
            ExportColumn::make('created_at')
                ->label('created_at'),
            ExportColumn::make('password')
                ->label('password'),
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
        $body = 'Your user export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
