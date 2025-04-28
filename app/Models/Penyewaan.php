<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyewaan extends Model
{
    public function details() : HasMany
    {
        return $this->hasMany(DetailPenyewaan::class);
    }

    public function ormawa() : BelongsTo
    {
        return $this->belongsTo(Ormawa::class);
    }
}
