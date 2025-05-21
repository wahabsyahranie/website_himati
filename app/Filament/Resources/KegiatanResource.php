<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kegiatan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KegiatanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KegiatanResource\RelationManagers;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Layanan Pengurus';
    protected static ?string $navigationLabel = 'Jadwal Kegiatan';
    protected static ?int $navigationSort = 9;
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::where('status', 1)->count();
    // }
    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return 'Kegiatan yang sedang berlangsung';
    // }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_pelaksana')
                    ->label('Tanggal & Waktu Pelaksanaan')
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('jenis_kegiatan')
                    ->native(false)
                    ->required()
                    ->options([
                        'rapat umum' => 'Rapat Umum',
                        'rapat panitia' => 'Rapat Panitia',
                        'proker primer' => 'Proker Primer',
                        'proker sekunder' => 'Proker Sekunder',
                    ]),
                Forms\Components\TextInput::make('tempat_pelaksanaan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\TextArea::make('tujuan_rapat')
                    ->required()
                    ->autocomplete(false)
                    ->rows(5)
                    ->cols(20)
                    ->columnSpanFull()
                    ->placeholder('Membahas progres selama 1 bulan sebelumnya...'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('Agenda Kegiatan')
            ->description('Kelola kegiatan HMJ TI disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Kegiatan'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Kegiatan')
                    ->description(fn (Kegiatan $record): string => $record->jenis_kegiatan, position: 'above')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_pelaksana')
                    ->label('Tanggal & Waktu Pelaksanaan')
                    ->sortable()
                    ->iconColor('primary')
                    ->icon('heroicon-m-calendar-days')
                    ->formatStateUsing(function ($state) {
                        Carbon::setLocale('id');
                        $tanggal = Carbon::parse($state)->translatedFormat('l, d F Y');
                        $waktu = Carbon::parse($state)->translatedFormat('H:i');
                        return ($tanggal) . ' | ' . ($waktu);
                    }),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Rapat dibuka'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Kegiatan')
                    ->options([
                        1 => 'Dibuka',
                        0 => 'Ditutup',
                    ]),
                SelectFilter::make('jenis_kegiatan')
                    ->label('Jenis Kegiatan')
                    ->options(function () {
                        return \App\Models\Kegiatan::query()
                            ->pluck('jenis_kegiatan', 'jenis_kegiatan')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('send')
                        ->color('success')
                        ->tooltip('Kirim ke Whatsapp')
                        ->icon('heroicon-m-chat-bubble-left-ellipsis')
                        ->openUrlInNewTab()
                        ->url(fn ($record) => route('kegiatan.send', $record->id)),
                    Tables\Actions\Action::make('absen')
                        ->visible(fn (Kegiatan $record) => $record->status === 1)
                        ->color('info')
                        ->tooltip('Absen Sekarang?')
                        ->icon('heroicon-m-arrow-right-end-on-rectangle')
                        ->disabled(function (Kegiatan $record){
                            $pengurusId = auth()->user()?->pengurus?->id;
                            if (!$pengurusId) {
                                return true;
                            }
                            return $record->absen_kegiatans()
                            ->where('penguruses_id', $pengurusId)
                            ->exists();
                        })
                        ->action(function (Kegiatan $record) {
                            $pengurusId = auth()->user()?->pengurus?->id;
                            if (!$pengurusId) {
                                Notification::make()
                                    ->title('Gagal Absen')
                                    ->body('User tidak terdaftar sebagai pengurus.')
                                    ->danger()
                                    ->send();
                                return;
                            }

                            $record->absen_kegiatans()->create([
                                'penguruses_id' => $pengurusId,
                                'kegiatan_id' => $record->id,
                                'keterangan' => 'hadir',
                            ]);

                            Notification::make()
                                ->title('Absen Berhasil')
                                ->success()
                                ->send();
                        }),
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
            RelationManagers\AbsenKegiatansRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
