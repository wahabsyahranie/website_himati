<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenyewaan extends Model
{
    protected $table = 'detail_penyewaans';
    protected $fillable = ['jumlah', 'status', 'penyewaan_id', 'inventaris_id'];
    public function inventaris() : BelongsTo
    {
        return $this->belongsTo(Inventaris::class, 'inventaris_id');
    }

    public function penyewaan() : BelongsTo
    {
        return $this->belongsTo(Penyewaan::class);
    }
}
