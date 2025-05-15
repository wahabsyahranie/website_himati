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
                ->label('id'),
            ExportColumn::make('type')
                ->label('type'),
            ExportColumn::make('departemen_id')
                ->label('departemen_id'),
            ExportColumn::make('nomor_surat')
                ->label('nomor_surat'),
            ExportColumn::make('lampiran')
                ->label('lampiran'),
            ExportColumn::make('perihal')
                ->label('perihal'),
            ExportColumn::make('pengesahan_id')
                ->label('pengesahan_id'),
            ExportColumn::make('isi')
                ->label('isi'),
            ExportColumn::make('tanggal_pelaksana')
                ->label('tanggal_pelaksana'),
            ExportColumn::make('tanggal_selesai')
                ->label('tanggal_selesai'),
            ExportColumn::make('waktu_pelaksana')
                ->label('waktu_pelaksana'),
            ExportColumn::make('waktu_selesai')
                ->label('waktu_selesai'),
            ExportColumn::make('tempat_pelaksana')
                ->label('tempat_pelaksana'),
            ExportColumn::make('nama_cp')
                ->label('nama_cp'),
            ExportColumn::make('nomor_cp')
                ->label('nomor_cp'),
            ExportColumn::make('slug')
                ->label('slug'),
            ExportColumn::make('user_id')
                ->label('user_id'),
            ExportColumn::make('status')
                ->label('status'),
            ExportColumn::make('tandatangan')
                ->label('tandatangan'),
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
        $body = 'Your pengajuan surat export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
