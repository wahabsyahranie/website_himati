<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'tahun_masuk', 'prodi', 'user_id'];

    public function pengurus() : HasOne {
        return $this->hasOne(Pengurus::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
