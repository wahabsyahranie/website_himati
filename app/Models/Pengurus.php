<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'penguruses';
    protected $fillable =['nomor_induk', 'jabatan', 'mahasiswa_id', 'periode', 'departemen', 'status'];
    protected $casts = [
        'departemen' => 'array',
    ];

    public function mahasiswa() : BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function absenKegiatans() : HasMany
    {
        return $this->hasMany(AbsenKegiatan::class, 'penguruses_id');
    }

}
