<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'nama', 'email', 'password', 'tahun_masuk', 'nomor_telepon', 'prodi'];
    
    public function pengaduans() : HasMany {
        return $this->hasMany(Pengaduan::class);
    }

}
