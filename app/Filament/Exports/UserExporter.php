<?php

namespace App\Filament\Exports;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Ormawa;
use App\Models\User;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\Enums\ExportFormat;
use OpenSpout\Common\Entity\Style\CellVerticalAlignment;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\Style;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UserExporter extends Exporter
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [

            ////USER
            ExportColumn::make('id')
                ->label('id'),
            ExportColumn::make('name')
                ->label('name'),
            ExportColumn::make('nomor_telepon')
                ->label('nomor_telepon'),
            ExportColumn::make('email')
                ->label('email'),
            ExportColumn::make('created_at')
                ->label('created_at'),
            ExportColumn::make('tipe_akun')
                ->label('tipe_akun'),

            ////MAHASISWA
            ExportColumn::make('nim')
                ->label('nim')
                ->state(fn (User $user) => $user->detail()?->nim ??  '-'),
            ExportColumn::make('tahun_masuk')
                ->label('tahun_masuk')
                ->state(fn (User $user) => $user->detail()?->tahun_masuk ?? '-'),
            ExportColumn::make('prodi')
                ->label('prodi')
                ->state(fn (User $user) => $user->detail()?->prodi ?? '-'),
            
            ////DOSEN
            ExportColumn::make('nip')
                ->label('nip')
                ->state(fn (User $user) => $user->detail()->nip ?? '-'),
            ExportColumn::make('jabatan')
                ->label('jabatan')
                ->state(fn (User $user) => $user->detail()->jabatan ?? '-'),
            
            ////ORMAWA
            ExportColumn::make('nama_pendek')
                ->label('nama_pendek')
                ->state(fn (User $user) => $user->detail()->nama_pendek ?? '-')

        ];
    }

    ////Mengganti Nama File
    public function getFileName(Export $export): string
    {
        $date = date('d-m-Y');
        return "Laporan-Masyarakat-TI-$date-{$export->getKey()}.xlsx";
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
    

    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
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
