<?php

namespace App\Filament\Resources\InventarisResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class DetailPenyewaansRelationManager extends RelationManager
{
    protected static string $relationship = 'detailPenyewaans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('penyewaan.ormawa.nama'),
                // Tables\Columns\TextColumn::make('jumlah'),
                Tables\Columns\TextColumn::make('segments')
                    ->label('Tanggal Penyewaan')
                    ->getStateUsing(function ($record) {
                        $tanggalPinjam = Carbon::parse($record->penyewaan->tanggal_pinjam)->format('d F Y');
                        $tanggalKembali = Carbon::parse($record->penyewaan->tanggal_kembali)->format('d F Y');
                        return $tanggalPinjam . ' - ' . $tanggalKembali;
                    }),
                Tables\Columns\TextColumn::make('penyewaan.status')
                    ->label('Status')
                    ->badge()->color(function ($record) {
                        return match ($record->penyewaan->status) {
                            'disetujui' => 'success',
                            'ditolak' => 'danger',
                            default => 'warning',
                        };
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
