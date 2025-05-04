<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengesahan extends Model
{
    use HasFactory;
    protected $table = 'pengesahans';
    protected $fillable = ['nama', 'jabatan', 'nomor_induk', 'nomor_telepon', 'bidang', 'prioritas', 'type_nomor_induk'];

    public function pengajuanSurats() : HasMany {
        return $this->hasMany(PengajuanSurat::class);
    }
}
