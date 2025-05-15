<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'departemens';
    protected $fillable = ['kode', 'nama_lengkap', 'nama_pendek', 'deskripsi', 'gambar', 'prioritas'];

    public function pengajuan_surats() : HasMany {
        return $this->hasMany(PengajuanSurat::class);
    }

    public function penguruses()
    {
        return $this->hasMany(Pengurus::class);
    }
}
