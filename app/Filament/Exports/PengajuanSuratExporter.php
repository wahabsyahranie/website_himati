<?php

namespace App\Filament\Exports;

use App\Models\PengajuanSurat;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;

class PengajuanSuratExporter extends Exporter
{
    protected static ?string $model = PengajuanSurat::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('type'),
            ExportColumn::make('nomor_surat'),
            ExportColumn::make('lampiran'),
            ExportColumn::make('perihal'),
            ExportColumn::make('isi'),
            ExportColumn::make('tanggal_pelaksana'),
            ExportColumn::make('tanggal_selesai'),
            ExportColumn::make('waktu_pelaksana'),
            ExportColumn::make('waktu_selesai'),
            ExportColumn::make('tempat_pelaksana'),
            ExportColumn::make('nama_cp'),
            ExportColumn::make('nomor_cp'),
            ExportColumn::make('slug'),
            ExportColumn::make('status'),
            ExportColumn::make('tandatangan'),
            ExportColumn::make('user.name'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('pengesahan.id'),
            ExportColumn::make('departemen.id'),
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
        $body = 'Your pengajuan surat export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
