<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Kelola Layanan';
    protected static ?string $navigationLabel = 'Pengaduan';
    protected static ?int $navigationSort = 6;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'ditinjau')->count();
    }
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Pengaduan yang masih ditinjau';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('tujuan')
                    ->required()
                    ->options([
                        'jurusan' => 'Jurusan',
                        'dosen' => 'Dosen',
                        'hmj ti' => 'HMJ TI',
                    ]),
                Forms\Components\Select::make('mahasiswa_id')
                    ->label('Pelapor')
                    ->relationship('mahasiswa', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tujuan'),
                Tables\Columns\TextColumn::make('mahasiswa.nama')
                    ->label('Nama Pelapor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()->color(function ($record) {
                        return match ($record->status) {
                            'dipublikasikan' => 'success',
                            'ditolak' => 'danger',
                            default => 'warning',
                        };
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(function () {
                        return \App\Models\Pengaduan::query()
                            ->pluck('status', 'status')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    // Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('tolak')
                        ->label('Tolak')
                        ->color('warning')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Pengaduan $record) => $record->status !== 'ditolak')
                        ->action(function (Pengaduan $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\Action::make('setujui')
                        ->label('Publikasikan')
                        ->color('success')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->visible(fn (Pengaduan $record) => $record->status !== 'dipublikasikan')
                        ->action(function (Pengaduan $record) {
                            $record->update(['status' => 'dipublikasikan']);
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            // 'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
