<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Pengaduan;
use App\Models\Pengesahan;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\PengajuanSurat;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Wahab\InspiringQuotes\InspiringCustom;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Exports\PengajuanSuratExporter;
use App\Filament\Imports\PengajuanSuratImporter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengajuanSuratResource\Pages;
use App\Filament\Resources\PengajuanSuratResource\RelationManagers;

class PengajuanSuratResource extends Resource
{
    protected static ?string $model = PengajuanSurat::class;

    protected static ?string $navigationGroup = 'Layanan';
    protected static ?string $navigationLabel = 'Pembuatan Surat';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Placeholder::make('')
                    ->content(new HtmlString(InspiringCustom::quote())),
                Wizard::make([
                    Wizard\Step::make('Informasi Surat')
                    ->icon('heroicon-m-document-text')
                    ->completedIcon('heroicon-o-document-text')
                    ->columns(2)
                    ->schema([
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
                                'SRe' => 'Surat Rekomendasi',
                            ]),
                        Forms\Components\Select::make('struktur_id')
                            ->label('Penerbit')
                            ->native(false)
                            ->required()
                            ->relationship('struktur', 'nama_pendek'),
                        Forms\Components\Repeater::make('tandatangan_digitals')
                            ->label('Tanda Tangan')
                            ->grid(2)
                            ->relationship()
                            ->columnSpanFull()
                            ->schema([
                                Forms\Components\Select::make('pengesahan_id')
                                    ->label('Nama')
                                    ->relationship('pengesahans', 'jabatan', modifyQueryUsing: fn ($query) => $query->with('sumberable.user'))
                                    ->native(false)
                                    ->getOptionLabelFromRecordUsing(function ($record) {
                                        return "{$record->jabatan} - {$record->sumberable->user->name}";
                                    })
                            ])
                            ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                                $pengesahan = \App\Models\Pengesahan::with('sumberable.user')->find($data['pengesahan_id']);

                                $fullName = $pengesahan?->sumberable?->user?->name ?? 'TANPA_NAMA';
                                $firstName = explode(' ', trim($fullName))[0] ?? 'TANPA_NAMA';
                                
                                $nomorRegistrasi = 'REG-' . rand(10000, 99999) . '-' . date('Ymd');
                                $data['nomor_registrasi'] = $nomorRegistrasi;

                                return $data;
                            }),
                    ]),
                    Wizard\Step::make('Detail Kegiatan')
                    ->icon('heroicon-m-calendar-days')
                    ->completedIcon('heroicon-o-calendar-days')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama_kegiatan')
                            ->label('Nama Kegiatan')
                            ->autocomplete(false)
                            ->required()
                            ->maxLength(255)
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\Select::make('tujuan_surat_id')
                            ->label('Tujuan Surat')
                            ->native(false)
                            ->required()
                            ->relationship('tujuan_surat', 'tujuan'),
                        Forms\Components\Textarea::make('tujuan_kegiatan')
                            ->label('Tujuan Kegiatan')
                            ->autocomplete(false)
                            ->required()
                            ->columnSpanFull()
                            ->rows(3)
                            ->maxLength(150)
                            ->helperText('Maksimal 380 karakter')
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['Spn', 'Spm', 'SPm'])),
                        Forms\Components\DatePicker::make('tanggal_pelaksana')
                            ->label('Tanggal Mulai')
                            ->native(false)
                            ->required()
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\DatePicker::make('tanggal_selesai')
                            ->afterOrEqual('tanggal_pelaksana')
                            ->label('Tanggal Selesai')
                            ->native(false)
                            ->helperText('Jika dihari yang sama. maka, pilih tanggal yang sama dengan tanggal mulai.')
                            ->required()
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\TimePicker::make('waktu_pelaksana')
                            ->label('Waktu Mulai')
                            ->native(false)
                            ->required()
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\TimePicker::make('waktu_selesai')
                            ->label('Waktu Selesai')
                            ->native(false)
                            ->required()
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\TextInput::make('tempat_pelaksana')
                            ->columnSpanFull()
                            ->label('Tempat Pelaksanaan')
                            ->autocomplete(false)
                            ->required()
                            ->maxLength(255)
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                    ]),
                    Wizard\Step::make('Lampiran')
                    ->icon('heroicon-m-paper-clip')
                    ->completedIcon('heroicon-o-paper-clip')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama_cp')
                            ->label('Nama Kontak Person')
                            ->autocomplete(false)
                            ->required()
                            ->maxLength(255)
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Forms\Components\TextInput::make('nomor_cp')
                            ->label('Nomor Kontak Person')
                            ->autocomplete(false)
                            ->numeric()
                            ->required()
                            ->maxLength(255)
                            ->hidden(fn (Get $get) => in_array($get('tipe_surat'), ['SM', 'Spn', 'SRe'])),
                        Repeater::make('lampiran')
                            ->label('Detail Lampiran')
                            ->visible(fn (Get $get) => in_array($get('tipe_surat'), ['SPm', 'Und', 'SM', 'Spn', 'Spm', 'SRe']))
                            ->schema([
                                TextInput::make('nama')
                                    ->required(),
                                TextInput::make('jumlah')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SPm']))
                                    ->required(),
                                TextInput::make('nim')
                                    ->label('NIM')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn', 'Spm', 'SRe']))
                                    ->required(),
                                TextInput::make('kelas')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['Spm']))
                                    ->required(),
                                TextInput::make('prodi')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn', 'SRe']))
                                    ->required(),
                                TextInput::make('no_hp')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM']))
                                    ->required(),
                                TextInput::make('jabatan')
                                    ->visible(fn (Get $get) => in_array($get('../../tipe_surat'), ['SM', 'Spn', 'SRe']))
                                    ->required(),
                            ])
                            ->grid(2)
                            ->columnSpanFull(),
                    ]),
                ])
                // ->submitAction(new HtmlString('<button type="submit">Submit</button>'))
                // ->startOnStep(3)
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
                    ->disabled(fn () => !Auth::user()->hasAnyRole(['super_admin', 'admin']))
                    ->exporter(PengajuanSuratExporter::class)
                    ->label('Ekspor Data'),
                // ImportAction::make()
                //     ->disabled(fn () => !Auth::user()->hasAnyRole(['super_admin', 'admin']))
                //     ->importer(PengajuanSuratImporter::class)
                //     ->label('Impor Data'),
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
                    ->description(fn (PengajuanSurat $record): string => match ($record->tipe_surat)
                        {
                            'SIk' => 'Surat Izin Kegiatan',
                            'SPm' => 'Surat Peminjaman',
                            'Und' => 'Surat Undangan',
                            'SM'  => 'Surat Mandat',
                            'Spn' => 'Surat Pernyataan Aktif',
                            'Spm' => 'Surat Permohonan Dispen',
                            'SRe' => 'Surat Rekomendasi',
                            default => 'Tipe Surat Tidak Dikenal',
                        },
                        position: 'above'
                    )
                    ->copyable()
                    ->copyMessage('Nomor surat disalin')
                    ->copyMessageDuration(1500),
                Tables\Columns\TextColumn::make('tujuan_surat.tujuan')
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
                Tables\Filters\selectFilter::make('pengesahan_id')
                    ->label('Tujuan Surat')
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
                        ->visible(fn (PengajuanSurat $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) || Auth::id() === optional($record->user)->id  && $record->status === 'disetujui'),
                    Tables\Actions\Action::make('Tolak Surat')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) && $record->status !== 'ditolak')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('Setujui Surat')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (PengajuanSurat $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) && $record->status !== 'disetujui')
                        ->action(function (PengajuanSurat $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('Unduh Surat')
                        ->visible(fn (PengajuanSurat $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) || Auth::id() === optional($record->user)->id  && $record->status === 'disetujui')
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
            'edit' => Pages\EditPengajuanSurat::route('/{record}/edit'),
        ];
    }
}
