<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduans';
    protected $fillable = ['judul', 'deskripsi', 'status', 'tujuan', 'mahasiswa_id', 'slug'];

    public function mahasiswa() : BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
