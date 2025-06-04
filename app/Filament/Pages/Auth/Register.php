<?php

namespace App\Filament\Pages\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Wizard;

use function PHPUnit\Framework\isEmpty;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Validation\ValidationException;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Wizard::make([
                            Wizard\Step::make('Akun')
                                ->icon('heroicon-m-user-group')
                                ->completedIcon('heroicon-o-user-group')
                                ->schema([
                                    $this->getIsMahasiswaSelect(),
                                ]),
                            Wizard\Step::make('Login')
                                ->icon('heroicon-m-lock-closed')
                                ->completedIcon('heroicon-o-lock-closed')
                                ->schema([
                                    $this->getNameFormComponent(),
                                    $this->getEmailFormComponent(),
                                    $this->getPasswordFormComponent(),
                                    $this->getPasswordConfirmationFormComponent(),
                                ]),
                            Wizard\Step::make('Profil')
                                ->icon('heroicon-m-identification')
                                ->completedIcon('heroicon-o-identification')
                                ->schema([
                                    $this->getTeleponFormComponent(),
                                    $this->getNimFormComponent(),
                                    $this->getProdiFormComponent(),
                                    $this->getTahunFormComponent(),
                                    $this->getNamaPendekFormComponent(),
                                    $this->getNipFormComponent(),
                                    $this->getJabatanFormComponent(),
                                    $this->getGambarFormComponent(),
                                ]),
                        ])
                        ->submitAction($this->getRegisterFormAction()),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            // $this->getRegisterFormAction(),
        ];
    }
    
    protected function handleRegistration(array $data): User
    {
        $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'nomor_telepon' => $data['nomor_telepon'],
        'tipe_akun' => $data['tipe_akun'],
    ]);

    switch ($data['tipe_akun']) {
        case 'dosen':
            if (!empty($data['nip']) && !empty($data['jabatan'])) {
                $user->dosen()->create([
                    'nip' => $data['nip'],
                    'jabatan' => $data['jabatan'],
                ]);
            }
            $user->assignRole('dosen');
            break;

        case 'ormawa':
            if (!empty($data['nama_pendek']) && !empty($data['lambang'])) {
                $user->ormawa()->create([
                    'nama_pendek' => $data['nama_pendek'],
                    'lambang' => $data['lambang'],
                ]);
            }
            $user->assignRole('ormawa');
            break;

        case 'mahasiswa':
            if (!empty($data['nim']) && !empty($data['tahun_masuk']) && !empty($data['prodi'])) {
                $user->mahasiswa()->create([
                    'nim' => $data['nim'],
                    'tahun_masuk' => $data['tahun_masuk'],
                    'prodi' => $data['prodi'],
                ]);
            }
            $user->assignRole('mahasiswa');
            break;

        default:
            $user->delete();
            throw ValidationException::withMessages([
                'tipe_akun' => 'Tipe akun tidak valid.',
            ]);
    }
    
        return $user;
    }
}
