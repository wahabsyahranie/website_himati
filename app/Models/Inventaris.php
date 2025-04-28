<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventaris extends Model
{
    public function detailPenyewaans() : HasMany
    {
        return $this->hasMany(DetailPenyewaan::class);
    }
}
