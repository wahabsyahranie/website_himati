<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $fillable = ['nama', 'stok', 'harga'];

    protected $casts = [
        'harga' => MoneyCast::class,
    ];
    public function detailPenyewaans() : HasMany
    {
        return $this->hasMany(DetailPenyewaan::class);
    }
}
