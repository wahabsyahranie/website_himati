<?php

namespace App\Filament\Exports;

use App\Models\PengajuanSurat;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Style;


class PengajuanSuratExporter extends Exporter
{
    protected static ?string $model = PengajuanSurat::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('nomor_surat')
                ->label('nomor_surat'),
            ExportColumn::make('tipe_surat')
                ->label('tipe_surat'),
            ExportColumn::make('struktur.nama_pendek')
                ->label('penerbit'),
            ExportColumn::make('pengesahan.jabatan')
                ->label('tujuan'),
            ExportColumn::make('status')
                ->label('status'),
            ExportColumn::make('user.name')
                ->label('nama_pembuat'),
            ExportColumn::make('created_at')
                ->label('dibuat_pada')
        ];
    }

    ////Mengganti Nama File
    public function getFileName(Export $export): string
    {
        $date = date('d-m-Y');
        return "Laporan-Surat-HMJTI-$date-{$export->getKey()}.xlsx";
    }

    ////Styling Xlsx
    public function getXlsxHeaderCellStyle(): ?Style
    {
        return (new Style())
            ->setFontName('Tahoma')
            ->setFontSize(12)
            // ->setFontBold(true)
            ->setFontColor(Color::rgb(255, 255, 255))
            ->setBackgroundColor(Color::rgb(0, 119, 182))
            // ->setCellAlignment(CellAlignment::CENTER)
            ->setCellVerticalAlignment(CellVerticalAlignment::CENTER);
            // ->setBorder(color: Color::rgb(200, 200, 200));
    }

    ////Format File Output
    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
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
