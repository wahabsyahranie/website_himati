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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;

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
                Forms\Components\Select::make('mahasiswa_id')
                    ->native(false)
                    ->label('Pilih Mahasiswa')
                    ->columnSpanFull()
                    ->relationship('mahasiswa', 'nama')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->native(false)
                    ->label('Jenis Surat')
                    ->required()
                    ->options([
                        'SIk' => 'Surat Izin Kegiatan',
                        'SPm' => 'Surat Peminjaman',
                        'ST' => 'Surat Tugas',
                        'Spe' => 'Surat Pemberitahuan',
                        'Und' => 'Surat Undangan',
                        'Peng' => 'Surat Pengumuman',
                        'SM' => 'Surat Mandat',
                    ]),
                Forms\Components\Select::make('departemen_id')
                    ->label('Departemen')
                    ->native(false)
                    ->required()
                    ->relationship('departemen', 'kode'),
                Forms\Components\TextInput::make('perihal')
                    ->label('Perihal Surat')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('pengesahan_id')
                    ->label('Tujuan Surat')
                    ->native(false)
                    ->required()
                    ->relationship('pengesahan', 'jabatan'),
                Forms\Components\Textarea::make('isi')
                    ->label('Isi Surat')
                    ->autocomplete(false)
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->maxLength(330)
                    ->helperText('Maksimal 380 karakter'),
                Forms\Components\DatePicker::make('tanggal_pelaksana')
                    ->label('Tanggal Mulai')
                    ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->afterOrEqual('tanggal_pelaksana')
                    ->label('Tanggal Selesai')
                    ->native(false)
                    ->helperText('Jika dihari yang sama. maka, pilih tanggal yang sama dengan tanggal mulai.')
                    ->required(),
                Forms\Components\TimePicker::make('waktu_pelaksana')
                    ->label('Waktu Mulai')
                    ->native(false)
                    ->required(),
                Forms\Components\TimePicker::make('waktu_selesai')
                    ->label('Waktu Selesai')
                    ->native(false)
                    ->required(),
                Forms\Components\TextInput::make('tempat_pelaksana')
                    ->label('Tempat Pelaksanaan')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tandatangan')
                    ->label('Tandatangan')
                    ->placeholder('Pilih tandatangan')
                    ->multiple()
                    ->options(function () {
                        return Pengesahan::all()->pluck('nama', 'nama')->toArray();
                    }),
                Forms\Components\TextInput::make('nama_cp')
                    ->label('Nama Kontak Person')
                    ->autocomplete(false)
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_cp')
                    ->label('Nomor Kontak Person')
                    ->autocomplete(false)
                    ->numeric()
                    ->required()
                    ->maxLength(255),
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
            ])
            ->columns([
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
                    ->description(fn (PengajuanSurat $record): string => $record->perihal, position: 'above')
                    ->copyable()
                    ->copyMessage('Nomor surat disalin')
                    ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('pengesahan.jabatan')
                    ->label('Tujuan Surat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()->color(function ($record) {
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
