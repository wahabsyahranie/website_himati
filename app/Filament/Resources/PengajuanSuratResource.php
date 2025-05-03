<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dosen;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Pengaduan;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\PengajuanSurat;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;

class PengajuanSuratResource extends Resource
{
    protected static ?string $model = PengajuanSurat::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-plus';
    protected static ?string $navigationGroup = 'Kelola Layanan';
    protected static ?string $navigationLabel = 'Pembuatan Surat';
    protected static ?int $navigationSort = 7;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'ditinjau')->count();
    }
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Surat yang masih ditinjau';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mahasiswa_id')
                    ->label('Pilih Mahasiswa')
                    ->columnSpanFull()
                    ->relationship('mahasiswa', 'nama')
                    ->required(),
                Forms\Components\Select::make('type')
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
                Forms\Components\Select::make('departemen')
                    ->label('Departemen')
                    ->required()
                    ->options([
                        'Agm' => 'Keagamaan',
                        'Kpm' => 'KPSDM',
                        'Min' => 'Minat dan Bakat',
                        'Hum' => 'Humas dan Media',
                        'Rt' => 'Rumah Tangga',
                        'Dan' => 'Dana dan Usaha',
                        'Bpi' => 'Badan Pengurus Inti',
                    ]),
                Forms\Components\TextInput::make('perihal')
                    ->label('Perihal Surat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('dosen_id')
                    ->label('Tujuan Surat')
                    ->required()
                    ->relationship('dosen', 'jabatan'),
                Forms\Components\Textarea::make('isi')
                    ->label('Isi Surat')
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->maxLength(330)
                    ->helperText('Maksimal 380 karakter'),
                Forms\Components\DatePicker::make('tanggal_pelaksana')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
                Forms\Components\TimePicker::make('waktu_pelaksana')
                    ->label('Waktu Mulai')
                    ->required(),
                Forms\Components\TimePicker::make('waktu_selesai')
                    ->label('Waktu Selesai')
                    ->required(),
                Forms\Components\TextInput::make('tempat_pelaksana')
                    ->label('Tempat Pelaksanaan')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Select::make('tandatangan')
                    ->label('Tandatangan')
                    ->multiple()
                    ->options(function () {
                        return Dosen::all()->pluck('nama', 'nama')->toArray();
                    }),
                Forms\Components\TextInput::make('nama_cp')
                    ->label('Nama Kontak Person')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_cp')
                    ->label('Nomor Kontak Person')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Diupdate')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perihal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('dosen.jabatan')
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
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
                        return \App\Models\Dosen::query()
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
                        ->color('gray'),
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
