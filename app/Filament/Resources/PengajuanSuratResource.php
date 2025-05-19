<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Pengaduan;
use App\Models\Pengesahan;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\PengajuanSurat;
use Filament\Resources\Resource;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Exports\PengajuanSuratExporter;
use App\Filament\Imports\PengajuanSuratImporter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

class PengajuanSuratResource extends Resource
{
    protected static ?string $model = PengajuanSurat::class;

    // protected static ?string $navigationIcon = 'heroicon-o-document-plus';
    protected static ?string $navigationGroup = 'Layanan Pengurus';
    protected static ?string $navigationLabel = 'Pembuatan Surat';
    protected static ?int $navigationSort = 8;
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::where('status', 'ditinjau')->count();
    // }
    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return 'Surat yang masih ditinjau';
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->native(false)
                    ->label('Pilih Mahasiswa')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('tipe_surat')
                    ->native(false)
                    ->label('Jenis Surat')
                    ->required()
                    ->live()
                    ->options([
                        'SIk' => 'Surat Izin Kegiatan',
                        'SPm' => 'Surat Peminjaman',
                        'Und' => 'Surat Undangan',
                        'SM' => 'Surat Mandat',
                        'Spn' => 'Surat Pernyataan Aktif',
                        'Spm' => 'Surat Permohonan Dispen',
                    ]),
                Forms\Components\Select::make('pengesahan_id')
                    ->label('Tujuan Surat')
                    ->native(false)
                    ->required()
                    ->relationship('pengesahan', 'jabatan'),
                Forms\Components\Select::make('struktur_id')
                    ->label('Pembuat')
                    ->native(false)
                    ->required()
                    ->relationship('struktur', 'nama_pendek'),
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\Textarea::make('tujuan_kegiatan')
                    ->label('Tujuan Kegiatan')
                    ->autocomplete(false)
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->maxLength(330)
                    ->helperText('Maksimal 380 karakter')
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['Spn', 'Spm'])),
                Forms\Components\DatePicker::make('tanggal_pelaksana')
                    ->label('Tanggal Mulai')
                    ->native(false)
                    ->required()
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->afterOrEqual('tanggal_pelaksana')
                    ->label('Tanggal Selesai')
                    ->native(false)
                    ->helperText('Jika dihari yang sama. maka, pilih tanggal yang sama dengan tanggal mulai.')
                    ->required()
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\TimePicker::make('waktu_pelaksana')
                    ->label('Waktu Mulai')
                    ->native(false)
                    ->required()
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\TimePicker::make('waktu_selesai')
                    ->label('Waktu Selesai')
                    ->native(false)
                    ->required()
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\TextInput::make('tempat_pelaksana')
                    ->label('Tempat Pelaksanaan')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255)
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\Select::make('tandatangan')
                    ->label('Tandatangan')
                    ->placeholder('Pilih tandatangan')
                    ->multiple()
                    ->columnSpanFull(fn (Get $get) => $get('tipe_surat') === 'SM')
                    ->required()
                    ->options(function () {
                        return Pengesahan::all()->pluck('nama', 'id')->toArray();
                    }),
                Forms\Components\TextInput::make('nama_cp')
                    ->label('Nama Kontak Person')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255)
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Forms\Components\TextInput::make('nomor_cp')
                    ->label('Nomor Kontak Person')
                    ->autocomplete(false)
                    ->numeric()
                    ->required()
                    ->maxLength(255)
                    ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn'])),
                Repeater::make('lampiran')
                    ->label('Detail Lampiran')
                    ->visible(fn (Get $get) => in_array($get('tipe_surat'), ['SPm', 'Und', 'SM', 'Spn', 'Spm']))
                    ->schema([
                        TextInput::make('nama')
                            ->required(),
                        TextInput::make('jumlah')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SPm']))
                            ->required(),
                        TextInput::make('nim')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn', 'Spm']))
                            ->required(),
                        TextInput::make('kelas')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['Spm']))
                            ->required(),
                        TextInput::make('prodi')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn']))
                            ->required(),
                        TextInput::make('no_hp')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM']))
                            ->required(),
                        TextInput::make('jabatan')
                            ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn']))
                            ->required(),
                    ])
                    ->grid(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Surat')
            ->description('Kelola surat anda disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Surat'),
                ExportAction::make()
                    ->exporter(PengajuanSuratExporter::class)
                    ->label('Ekspor Data'),
                ImportAction::make()
                    ->importer(PengajuanSuratImporter::class)
                    ->label('Impor Data'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diupdate')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->searchable()
                    // ->description(fn (PengajuanSurat $record): string => $record->perihal, position: 'above')
                    ->copyable()
                    ->copyMessage('Nomor surat disalin')
                    ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('pengesahan.jabatan')
                    ->label('Tujuan Surat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(function ($record) {
                        return match ($record->status) {
                            'disetujui' => 'success',
                            'ditolak' => 'danger',
                            'diproses' => 'info',
                            default => 'warning',
                        };
                    }),
                Tables\Columns\TextColumn::make('tandatangan')
                    ->label('Tandatangan')
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\selectFilter::make('status')
                    ->options(function () {
                        return \App\Models\PengajuanSurat::query()
                            ->pluck('status', 'status')
                            ->unique()
                            ->sort()
                            ->toArray();
                    }),
                Tables\Filters\selectFilter::make('dosen_id')
                    ->options(function () {
                        return \App\Models\Pengesahan::query()
                            ->pluck('jabatan', 'id')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
                ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('Lihat Surat')
                        ->color('gray')
                        ->icon('heroicon-o-eye')
                        ->url(fn ($record) => route('surat.show', $record->slug))
                        ->openUrlInNewTab()
                        ->color('gray')
                        ->visible(fn (PengajuanSurat $record) => $record->status === 'disetujui'),
                    Tables\Actions\Action::make('Tolak Surat')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => $record->status !== 'ditolak')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('Setujui Surat')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => $record->status !== 'disetujui')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('Unduh Surat')
                        ->visible(fn (PengajuanSurat $record) => $record->status === 'disetujui')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->openUrlInNewTab()
                        ->url(fn ($record) => route('surat.unduh', $record->slug)),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                        ->exporter(PengajuanSuratExporter::class)
                        ->label('Ekspor Data'),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengajuanSurats::route('/'),
            'create' => Pages\CreatePengajuanSurat::route('/create'),
            // 'edit' => Pages\EditPengajuanSurat::route('/{record}/edit'),
        ];
    }
}
