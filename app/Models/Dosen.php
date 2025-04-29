<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosens';
    protected $fillable = ['nama', 'jabatan', 'nip', 'nomor_telepon'];

    public function pengajuanSurats() : HasMany {
        return $this->hasMany(PengajuanSurat::class);
    }
}
