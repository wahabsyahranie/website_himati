<?php

namespace App\Filament\Resources\KegiatanResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pengurus;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AbsenKegiatan;
use Illuminate\Support\Carbon;
use Filament\Forms\FormsComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class AbsenKegiatansRelationManager extends RelationManager
{
    protected static string $relationship = 'absen_kegiatans';

    public function getTableQuery(): Builder
    {
        $kegiatanId = $this->ownerRecord->id;

        return Pengurus::with([
            'mahasiswa',
            'absenKegiatans' => function ($query) use ($kegiatanId) {
                $query->where('kegiatan_id', $kegiatanId);
            }
        ])->where('status', 'pengurus')->select('penguruses.*');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
    {
        $kegiatanId = $this->ownerRecord->id;
        return $table
            ->recordTitleAttribute('detail')
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('mahasiswa.user.name')
                    ->label('Nama Pengurus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('absenKegiatans.keterangan')
                    ->label('Keterangan')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        // Ambil absen berdasarkan kegiatan_id
                        $absen = $record->absenKegiatans->first();
                        if ($absen && $absen->keterangan) {
                            return $absen->keterangan;
                        }
                        return 'belum absen';
                    })
                    ->color(function ($record) {
                        // Ambil absen berdasarkan kegiatan_id
                        $absen = $record->absenKegiatans
                            ->where('kegiatan_id', $this->ownerRecord->id)
                            ->first();
                        if ($absen) {
                            return match ($absen->keterangan) {
                                'hadir' => 'success',
                                'ijin' => 'warning',
                                'alpa' => 'danger',
                                default => 'gray',
                            };
                        }
                        // Jika tidak ada absen, kembalikan warna gray
                        return 'gray';
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('Hadir')
                    ->label(false)
                    ->outlined()
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(function (Pengurus $record) use ($kegiatanId) {
                        AbsenKegiatan::updateOrCreate(
                            [
                                'kegiatan_id' => $kegiatanId,
                                'penguruses_id' => $record->id,
                            ],
                            [
                                'keterangan' => 'hadir'
                            ]
                        );
                    }),
                Tables\Actions\Action::make('Ijin')
                    ->label(false)
                    ->color('warning')
                    ->icon('heroicon-o-information-circle')
                    ->action(function (Pengurus $record) use ($kegiatanId) {
                        AbsenKegiatan::updateOrCreate(
                            [
                                'kegiatan_id' => $kegiatanId,
                                'penguruses_id' => $record->id,
                            ],
                            [
                                'keterangan' => 'ijin'
                            ]
                        );
                    }),
                Tables\Actions\Action::make('Alpa')
                    ->label(false)
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->action(function (Pengurus $record) use ($kegiatanId) {
                        AbsenKegiatan::updateOrCreate(
                            [
                                'kegiatan_id' => $kegiatanId,
                                'penguruses_id' => $record->id,
                            ],
                            [
                                'keterangan' => 'alpa'
                            ]
                        );
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
