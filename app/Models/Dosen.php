<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $fillable = ['nip', 'jabatan', 'user_id'];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function pengesahans(): MorphMany
    {
        return $this->morphMany(Pengesahan::class, 'sumberable');
    }
}
