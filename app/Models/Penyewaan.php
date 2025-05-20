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
    protected $fillable = ['tanggal_pinjam', 'tanggal_kembali', 'user_id', 'status', 'nomor_pesanan'];

    public function detail_penyewaans() : HasMany
    {
        return $this->hasMany(DetailPenyewaan::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
