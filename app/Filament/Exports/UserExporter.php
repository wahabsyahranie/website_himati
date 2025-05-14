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
                ->label('ID'),
            ExportColumn::make('nim'),
            ExportColumn::make('name')
                ->label('Nama'),
            ExportColumn::make('tahun_masuk'),
            ExportColumn::make('nomor_telepon'),
            ExportColumn::make('prodi'),
            ExportColumn::make('email'),
            ExportColumn::make('email_verified_at')
                ->label('Diverifikasi pada'),
            ExportColumn::make('created_at')
                ->label('Dibuat pada'),
            ExportColumn::make('updated_at')
                ->label('Diupdate pada'),
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
