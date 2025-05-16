<?php

namespace App\Filament\Pages\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Filament\Pages\Auth\Register as BaseRegister;

use function PHPUnit\Framework\isEmpty;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getIsMahasiswaSelect(),
                        $this->getNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getTeleponFormComponent(),
                        $this->getNimFormComponent()->live(),
                        $this->getProdiFormComponent()->live(),
                        $this->getTahunFormComponent()->live(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function handleRegistration(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nomor_telepon' => $data['nomor_telepon'],
            'tipe_akun' => $data['tipe_akun']
            
        ]);

        if(!empty($data['nim']) && !empty($data['prodi']) && !empty($data['tahun_masuk'])) {
            // Simpan ke tabel relasi user_detail
            $user->userDetail()->create([
                'nim' => $data['nim'],
                'prodi' => $data['prodi'],
                'tahun_masuk' => $data['tahun_masuk'],
            ]);
        }
        return $user;
    }
}
