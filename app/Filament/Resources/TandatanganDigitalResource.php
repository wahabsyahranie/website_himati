<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\TandatanganDigital;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TandatanganDigitalResource\Pages;
use App\Filament\Resources\TandatanganDigitalResource\RelationManagers;

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
                Forms\Components\TextInput::make('pengesahan_id')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('pengajuan_surat_id')
                    ->relationship('pengajuan_surats', 'nomor_surat')
                    ->required(),
                Forms\Components\TextInput::make('nomor_registrasi')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextArea::make('catatan')
                    ->required()
                    ->columnSpanFull()
                    ->rows(3)
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $query->whereHas('pengajuan_surats', function ($q) {
                    $q->where('status', 'disetujui');
                });

                if (auth()->user()?->tipe_akun === 'dosen') {
                    return $query
                        ->whereHas('pengesahans.sumberable', function ($q) { 
                            $q->where('user_id', auth()->id());
                        });
                }

                return $query;
            })
            ->heading('Permintaan Tandatangan')
            ->description("Harap memeriksa isi surat terlebih dahulu sebelum menyetujui, dan tinggalkan catatan bila perlu perbaikan.")
            ->deferLoading()
            ->striped()
            ->columns([
                Tables\Columns\TextColumn::make('pengesahans.sumberable.user.name')
                    ->label('Pemilik Tandatangan')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengajuan_surats.nomor_surat')
                    ->label('Nomor Surat')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nomor_registrasi')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('catatan')
                    // ->rules(['required'])
                    ,
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
                    Tables\Actions\Action::make('Periksa Surat')
                        ->color('info')
                        ->icon('heroicon-o-information-circle')
                        // ->visible(fn (TandatanganDigital $record) => Auth::id() === optional($record->pengesahans?->sumberable)->user->id)
                        ->url(fn ($record) => route('surat.show', $record->pengajuan_surats->slug))
                        ->openUrlInNewTab(),
                    Tables\Actions\Action::make('Setujui')
                        ->color('success')
                        ->icon('heroicon-o-check-badge')
                        ->requiresConfirmation()
                        ->visible(fn (TandatanganDigital $record) => Auth::id() === optional($record->pengesahans?->sumberable)->user->id && $record->status != 'disetujui')
                        ->action(function (TandatanganDigital $record) {
                            $record->update(['status' => 'disetujui']);
                        }),
                    Tables\Actions\Action::make('Tolak')
                        ->color('danger')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        ->visible(fn (TandatanganDigital $record) => Auth::id() === optional($record->pengesahans?->sumberable)->user->id && $record->status != 'disetujui')
                        ->action(function (TandatanganDigital $record) {
                            $record->update(['status' => 'ditolak']);
                        }),
                    Tables\Actions\ViewAction::make()
                        ->icon('heroicon-o-eye'),
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
