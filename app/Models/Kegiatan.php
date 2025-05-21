<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $fillable = ['nama', 'tanggal_pelaksana', 'status', 'jenis_kegiatan', 'tujuan_rapat', 'tempat_pelaksanaan', 'user_id'];

    public function absen_kegiatans() : HasMany {
        return $this->hasMany(AbsenKegiatan::class);
    }
    
    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
