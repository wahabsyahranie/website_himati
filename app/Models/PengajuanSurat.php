<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $table = 'pengajuan_surats';
    protected $fillable = ['type', 'kota', 'tanggal_pembuatan', 'nomor_surat', 'lampiran', 'perihal', 'Tertuju', 'isi', 'tanggal_pelaksana', 'waktu_pelaksana', 'tempat_pelaksana', 'penutup', 'nama_cp', 'nomor_cp', 'slug', 'mahasiswa_id', 'dosen_id', 'status'];

    public function mahasiswa() : BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function dosen() : BelongsTo
    {
        return $this->belongsTo(Dosen::class);
    }
}
