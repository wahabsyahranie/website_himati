<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'penguruses';
    protected $fillable =['nomor_induk', 'jabatan', 'user_id', 'periode', 'struktur_id', 'status', 'gambar'];
    protected $casts = [
        'departemen' => 'array',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function absenKegiatans() : HasMany
    {
        return $this->hasMany(AbsenKegiatan::class, 'penguruses_id');
    }

    public function absenKegiatanNotAlpas() : HasMany
    {
        return $this->hasMany(AbsenKegiatan::class, 'penguruses_id')->where('keterangan', '!=', 'alpa');
    }

    public function struktur()
    {
        return $this->belongsTo(Struktur::class);
    }

    public function review() : HasOne
    {
        return $this->hasOne(Review::class);
    }
}
