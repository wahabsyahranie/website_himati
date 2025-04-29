<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\PengajuanSurat;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;
use App\Models\Pengaduan;

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->label('Pilih Kelas Surat')
                    ->required()
                    ->options(function () {
                        return \App\Models\PengajuanSurat::query()
                            ->pluck('type', 'type')
                            ->unique()
                            ->sort()
                            ->toArray();
                    }),
                Forms\Components\TextInput::make('kota')
                    ->label('Surat Ini Dibuat di Kota')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_pembuatan')
                    ->label('Surat Ini Dibuat Pada Tanggal')
                    ->required(),
                Forms\Components\TextInput::make('nomor_surat')
                    ->label('Nomor Surat')
                    ->required()
                    ->maxLength(255)
                    ->debounce(1000)
                    ->afterStateUpdated(function (Set $set, $state){
                        $slug = Str::of($state)
                            ->replace('/', '-')
                            ->lower()
                            ->trim('-');
                        $set('slug', $slug);
                    }),
                Forms\Components\TextInput::make('lampiran')
                    ->label('Lampiran Surat')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('perihal')
                    ->label('Perihal Surat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('dosen_id')
                    ->required()
                    ->relationship('dosen', 'jabatan'),
                Forms\Components\Textarea::make('isi')
                    ->label('Isi Surat')
                    ->required()
                    ->columnSpanFull()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_pelaksana')
                    ->label('Tanggal Pelaksanaan Event')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\TimePicker::make('waktu_pelaksana')
                    ->label('Waktu Pelaksanaan Event')
                    ->required(),
                Forms\Components\TextInput::make('tempat_pelaksana')
                    ->label('Tempat Pelaksanaan Event')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('penutup')
                    ->label('Kalimat Penutup')
                    ->required()
                    ->columnSpanFull()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nama_cp')
                    ->label('Nama Kontak Person')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nomor_cp')
                    ->label('Nomor Kontak Person')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->readOnly()
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\Select::make('mahasiswa_id')
                    ->label('Pilih Mahasiswa')
                    ->columnSpanFull()
                    ->relationship('mahasiswa', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_pembuatan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_surat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('perihal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('Tertuju')
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
            ])
            ->filters([
                Tables\Filters\selectFilter::make('status')
                    ->options(function () {
                        return \App\Models\PengajuanSurat::query()
                            ->pluck('status', 'status')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    // Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\Action::make('Tolak Surat')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => $record->status !== 'ditolak')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('Proses Surat')
                        ->color('info')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => $record->status !== 'diproses')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'diproses']);
                        }),
                    Tables\Actions\Action::make('Tandai Surat Disetujui')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => $record->status !== 'disetujui')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('Unduh Surat')
                        ->color('gray')
                        ->icon('heroicon-o-document-arrow-down')
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
