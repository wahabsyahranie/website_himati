<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Dosen;
use App\Models\Pengurus;
use Filament\Forms\Form;
use App\Models\Pengesahan;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PengesahanResource\Pages;
use App\Filament\Resources\PengesahanResource\RelationManagers;
use Filament\Forms\Get;

class PengesahanResource extends Resource
{
    protected static ?string $model = Pengesahan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Surat';
    protected static ?string $navigationLabel = 'Data Tanda Tangan';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sumberable_type')
                    ->label('Tipe Pengesahan')
                    ->options([
                        'App\Models\Dosen' => 'Dosen',
                        'App\Models\Pengurus' => 'Pengurus',
                    ])
                    ->reactive()
                    ->required(),
                Forms\Components\Select::make('sumberable_id')
                    ->label('Nama Pengesah')
                    ->options(function (callable $get) {
                        $tipe = $get('sumberable_type');

                        if ($tipe === 'App\Models\Dosen') {
                            return Dosen::with('user')
                                ->get()
                                ->mapWithKeys(function ($dosen) {
                                    $name = optional($dosen->user)->name;
                                    $nip  = $dosen->nip;

                                    return [$dosen->id => "{$name} ({$nip})"];
                                })
                                ->toArray();
                        }

                        if ($tipe === 'App\Models\Pengurus') {
                            return Pengurus::with(['user.mahasiswa'])
                                ->get()
                                ->mapWithKeys(function ($pengurus) {
                                    $name = optional($pengurus->user)->name;
                                    $nim  = optional($pengurus->user->mahasiswa)->nim;

                                    return [$pengurus->id => "{$name} ({$nim})"];
                                })
                                ->toArray();
                        }

                        return [];
                    })
                    ->searchable()
                    ->required()
                    ->preload(),
                Forms\Components\TextInput::make('jabatan')
                    ->required()
                    ->autocomplete(false)
                    ->maxLength(255),
                Forms\Components\Select::make('prioritas')
                    ->label('Level Prioritas')
                    ->native(false)
                    ->required()
                    ->options([
                        1 => '1 (Pimpinan PTN)', 
                        2 => '2 (Pimpinan Jurusan)',
                        3 => '3 (Pembina)',
                        4 => '4 (Ketua Organisasi)',
                        5 => '5 (Sekretaris/Kepala Departemen/Ketua Panitia)'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        // $query = Pengesahan::withSumberableRelations();
    // dd($query->get()); // Dump isi data
        return $table
            ->query(Pengesahan::withSumberableRelations() ?? '-')
            ->heading('Tanda Tangan')
            ->description('Kelola tanda tangan untuk pembuatan surat disini.')
            ->deferLoading()
            ->striped()
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Pengesahan'),
            ])
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('sumberable_type')
                    ->label('Nama')
                    ->getStateUsing(function ($record) {
                        if ($record->sumberable_type === 'App\Models\Dosen') {
                            return optional($record->sumberable)->user?->name ?? 'Error: User dihapus';
                        }

                        if ($record->sumberable_type === 'App\Models\Pengurus') {
                            return optional($record->sumberable)->user?->name?? 'Error: User dihapus';
                        }

                        return '-';
                    })
                    ->color(fn ($state) => $state === 'Error: User dihapus' ? 'danger' : null)
                    ->searchable()
                    ->limit(20),

                Tables\Columns\TextColumn::make('jabatan')
                    // ->searchable(isIndividual: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('prioritas')
                    ->searchable()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\selectFilter::make('jabatan')
                    ->options(function () {
                        return \App\Models\Pengesahan::query()
                            ->pluck('jabatan', 'jabatan')
                            ->unique()
                            ->sort()
                            ->toArray();
                    })
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    // Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPengesahans::route('/'),
            'create' => Pages\CreatePengesahan::route('/create'),
            'edit' => Pages\EditPengesahan::route('/{record}/edit'),
        ];
    }
}
