<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ormawa extends Model
{
    public function penyewaans() : HasMany
    {
        return $this->hasMany(Penyewaan::class);
    }
}
