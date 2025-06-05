<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Ormawa;


class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    //MENGHILANGKAN TANDA PETIK
    public function __invoke(array $data): void
    {
        // Hapus tanda petik di semua kolom
        $data = array_map(fn($value) => is_string($value) ? str_replace('"', '', $value) : $value, $data);
        parent::__invoke($data);
    }

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('id'),
            ImportColumn::make('name'),
            ImportColumn::make('email'),
            ImportColumn::make('nomor_telepon'),
            ImportColumn::make('tipe_akun'),
            ImportColumn::make('nim'),
            ImportColumn::make('tahun_masuk'),
            ImportColumn::make('prodi'),
            ImportColumn::make('nip'),
            ImportColumn::make('jabatan'),
            ImportColumn::make('nama_pendek'),
        ];
    }


    public function fillRecord(): void
    {
        $this->record->fill([
            'id' => $this->data['id'] ?? null,
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'nomor_telepon' => $this->data['nomor_telepon'] ?? null,
            'tipe_akun' => $this->data['tipe_akun'],
            'password' => bcrypt('default_password'),
        ]);

        // dd($this->data);
    }


    protected function afterSave(): void
    {
        $user = $this->record;

        // dd($this);
        match ($user->tipe_akun) {
            'mahasiswa' => Mahasiswa::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nim' => $this->data['nim'] ?? null,
                    'tahun_masuk' => $this->data['tahun_masuk'] ?? null,
                    'prodi' => $this->data['prodi'] ?? null,
                ]
            ),
            'dosen' => Dosen::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nip' => $this->data['nip'] ?? null,
                    'jabatan' => $this->data['jabatan'] ?? null,
                ]
            ),
            'ormawa' => Ormawa::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'nama_pendek' => $this->data['nama_pendek'] ?? null,
                    'lambang' => 'tidak ada gambar',
                ]
            ),
        };
    }


    public function resolveRecord(): ?User
    {
        return User::firstOrNew([
            'email' => $this->data['email'],
        ]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your user import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
