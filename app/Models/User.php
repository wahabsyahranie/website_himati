<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUlids, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nomor_telepon',
        'tipe_akun'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function pengaduans() : HasMany {
        return $this->hasMany(Pengaduan::class);
    }

    public function pengajuanSurats() : HasMany {
        return $this->hasMany(PengajuanSurat::class);
    }

    public function kegiatans() : HasMany {
        return $this->hasMany(Kegiatan::class);
    }

    public function penyewaans() : HasMany
    {
        return $this->hasMany(Penyewaan::class);
    }

    public function pengurus()
    {
        return $this->hasOne(Pengurus::class);
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function ormawa()
    {
        return $this->hasOne(Ormawa::class);
    }

    public function detail()
    {
        return match ($this->tipe_akun) {
            'mahasiswa' => $this->mahasiswa,
            'dosen' => $this->dosen,
            'ormawa' => $this->ormawa,
        };
    }
}
