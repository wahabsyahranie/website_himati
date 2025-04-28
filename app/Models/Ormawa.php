<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ormawa extends Model
{
    protected $table = 'ormawas';
    protected $fillable = ['nama', 'username', 'password', 'email', 'nomor_telepon'];
    public function penyewaans() : HasMany
    {
        return $this->hasMany(Penyewaan::class);
    }
}
