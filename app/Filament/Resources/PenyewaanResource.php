<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Penyewaan;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PenyewaanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenyewaanResource\RelationManagers;

class PenyewaanResource extends Resource
{
    protected static ?string $model = Penyewaan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';
    protected static ?string $navigationGroup = 'Kelola Layanan';
    protected static ?string $navigationLabel = 'Penyewaan Inventaris';
    protected static ?int $navigationSort = 8;
    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::where('status', 'ditinjau')->count();
    // }
    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return 'Penyewaan yang menunggu persetujuan';
    // }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ormawa_id')
                    ->relationship('ormawa', 'nama')
                    ->native(false)
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('tanggal_pinjam')
                    ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_kembali')
                    ->after('tanggal_pinjam')
                    ->native(false)
                    ->required(),
                Forms\Components\Repeater::make('detail_penyewaans')
                    ->relationship()
                    ->schema([
                        Forms\Components\Select::make('inventaris_id')
                            ->relationship('inventaris', 'nama')
                            ->native(false)
                            ->required()
                            ->debounce(1000)
                            ->afterStateUpdated(function (Set $set, $state){
                                $inventaris = \App\Models\Inventaris::find($state);
                                $set('harga_pcs', $inventaris?->harga ?? 0);
                            }),
                        Forms\Components\TextInput::make('harga_pcs')
                            ->disabled()
                            ->default(0)
                            ->prefix('Rp.')
                            ->debounce(1000)
                            ->numeric( 0)
                            ->afterStateHydrated(fn($record, $set) => $set('harga_pcs', $record?->inventaris->harga)),
                        Forms\Components\TextInput::make('jumlah')
                            ->required()
                            ->debounce(1000)
                            ->afterStateHydrated(function ($state, callable $set, callable $get) {
                                $set('harga_total', (int) $get('harga_pcs') * (int) $state);
                            }),
                        Forms\Components\TextInput::make('harga_total')
                            ->label('Harga Pesanan')
                            ->disabled()
                            ->prefix('Rp.'),
                    ])
                    ->grid(2)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('harga_total')
                    ->placeholder(function (Set $set, Get $get) {
                        $ttlpesan = collect($get('detail_penyewaans'))->pluck('harga_total')->sum();
                        if (empty($ttlpesan)) {
                            $ttlpesan = 0;
                        } else {
                            $set('harga_total', $ttlpesan);
                        }
                    })
                    ->prefix('Rp')
                    ->disabled()
                    ->label('Total Harga Pesanan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Ajukan Penyewaan'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('ormawa.nama')
                    ->label('Ormawa')
                    ->sortable()
                    ->searchable()
                    ->description(
                        fn (Penyewaan $record): string =>
                            \Carbon\Carbon::parse($record->tanggal_pinjam)->format('d F Y') . ' - ' .
                            \Carbon\Carbon::parse($record->tanggal_kembali)->format('d F Y'),
                        position: 'above'
                    ),
                Tables\Columns\TextColumn::make('detail_penyewaans.inventaris.nama')
                    ->label('Inventaris')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()->color(function ($record) {
                        return match ($record->status) {
                            'disetujui' => 'success',
                            'ditolak' => 'danger',
                            default => 'warning',
                        };
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\selectFilter::make('status')
                    ->options(function () {
                        return \App\Models\Penyewaan::query()
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
                    Tables\Actions\Action::make('Tolak Penyewaan')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Penyewaan $record) => $record->status !== 'ditolak')
                        ->action(function (Penyewaan $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('Setujui Penyewaan')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Penyewaan $record) => $record->status !== 'disetujui')
                        ->action(function (Penyewaan $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPenyewaans::route('/'),
            'create' => Pages\CreatePenyewaan::route('/create'),
            // 'edit' => Pages\EditPenyewaan::route('/{record}/edit'),
        ];
    }
}
