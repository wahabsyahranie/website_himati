<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbsenKegiatan extends Model
{
    protected $table = 'absen_kegiatans';
    protected $fillable = ['jabatan_kegiatan', 'penguruses_id', 'kegiatan_id'];

    public function pengurus() : BelongsTo {
        return $this->belongsTo(Pengurus::class, 'penguruses_id');
    }

    public function kegiatan() : BelongsTo {
        return $this->belongsTo(Kegiatan::class);
    }
}
