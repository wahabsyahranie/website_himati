<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPengurus extends Model
{
    protected $table = 'detail_penguruses';
    protected $fillable = ['penguruses_id', 'departemen'];

    public function pengurus(): BelongsTo {
        return $this->belongsTo(Pengurus::class, 'penguruses_id');
    }
}
