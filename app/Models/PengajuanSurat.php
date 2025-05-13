<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_surats';
    protected $fillable = ['type', 'departemen_id', 'nomor_surat', 'lampiran', 'perihal', 'Tertuju', 'isi', 'tanggal_pelaksana', 'waktu_pelaksana', 'tanggal_selesai', 'waktu_selesai', 'tempat_pelaksana', 'nama_cp', 'nomor_cp', 'slug', 'mahasiswa_id', 'pengesahan_id', 'status', 'tandatangan'];

    protected $casts = [
        'tandatangan' => 'array',
    ];
    public function mahasiswa() : BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pengesahan() : BelongsTo
    {
        return $this->belongsTo(Pengesahan::class);
    }

    public function departemen() : BelongsTo
    {
        return $this->belongsTo(Departemen::class);
    }
}
