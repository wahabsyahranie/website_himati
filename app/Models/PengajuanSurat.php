<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_surats';
    protected $fillable = ['tipe_surat', 'struktur_id', 'nomor_surat', 'nama_kegiatan', 'tujuan_kegiatan', 'tanggal_pelaksana', 'waktu_pelaksana', 'tanggal_selesai', 'waktu_selesai', 'tempat_pelaksana', 'nama_cp', 'nomor_cp', 'slug', 'user_id', 'pengesahan_id', 'status', 'tandatangan', 'lampiran', 'detail_surat'];

    protected $casts = [
        'tandatangan' => 'array',
        'lampiran' => 'array',
        'detail_surat' => 'array',
    ];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pengesahan() : BelongsTo
    {
        return $this->belongsTo(Pengesahan::class);
    }

    public function struktur() : BelongsTo
    {
        return $this->belongsTo(Struktur::class);
    }

    public function tandatangan_digitals() : HasMany
    {
        return $this->hasMany(TandatanganDigital::class);
    }
}
