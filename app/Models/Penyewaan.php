<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyewaan extends Model
{
    use HasFactory;
    protected $table = 'penyewaans';
    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'ormawa_id', 'status'];

    public function detail_penyewaans() : HasMany
    {
        return $this->hasMany(DetailPenyewaan::class);
    }

    public function ormawa() : BelongsTo
    {
        return $this->belongsTo(Ormawa::class);
    }
}
