<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenyewaan extends Model
{
    public function inventaries() : BelongsTo
    {
        return $this->belongsTo(Inventaris::class);
    }

    public function penyewaan() : BelongsTo
    {
        return $this->belongsTo(Penyewaan::class);
    }
}
