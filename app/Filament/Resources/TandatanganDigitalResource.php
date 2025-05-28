<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TandatanganDigitalResource\Pages;
use App\Filament\Resources\TandatanganDigitalResource\RelationManagers;
use App\Models\TandatanganDigital;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TandatanganDigitalResource extends Resource
{
    protected static ?string $model = TandatanganDigital::class;

    protected static ?string $navigationGroup = 'Layanan';
    protected static ?string $navigationLabel = 'Tandatangan Digital';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('pengesahan_id')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('surat_id')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('nomor_registrasi')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('link')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('status')
                //     ->required()
                //     ->maxLength(255)
                //     ->default('diproses'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pengesahans.sumberable.user.name')
                    ->label('Pemilik Tandatangan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pengajuan_surats.nomor_surat')
                    ->label('Nomor Surat')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_registrasi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(function ($record) {
                        return match ($record->status) {
                            'disetujui' => 'success',
                            'ditolak' => 'danger',
                            'diproses' => 'info',
                            default => 'warning',
                        };
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('Lihat Surat')
                        ->color('gray')
                        ->icon('heroicon-o-eye')
                        ->url(fn ($record) => route('surat.show', $record->pengajuan_surats->slug))
                        ->openUrlInNewTab(),
                    Tables\Actions\Action::make('Setujui')
                        ->action(function (TandatanganDigital $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\Action::make('Tolak')
                        ->action(function (TandatanganDigital $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTandatanganDigitals::route('/'),
            'create' => Pages\CreateTandatanganDigital::route('/create'),
            'edit' => Pages\EditTandatanganDigital::route('/{record}/edit'),
        ];
    }
}
