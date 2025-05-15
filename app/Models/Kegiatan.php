<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $fillable = ['nama', 'tanggal_pelaksana', 'status', 'jenis_kegiatan', 'tujuan_rapat', 'tempat_pelaksanaan'];

    public function absen_kegiatans() : HasMany {
        return $this->hasMany(AbsenKegiatan::class);
    }
}
