<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_surats';
    protected $fillable = ['tipe_surat', 'struktur_id', 'nomor_surat', 'nama_kegiatan', 'tujuan_kegiatan', 'tanggal_pelaksana', 'waktu_pelaksana', 'tanggal_selesai', 'waktu_selesai', 'tempat_pelaksana', 'nama_cp', 'nomor_cp', 'slug', 'user_id', 'pengesahan_id', 'status', 'tandatangan', 'lampiran'];

    protected $casts = [
        'tandatangan' => 'array',
        'lampiran' => 'array',
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
}
