<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Pengesahan extends Model
{
    use HasFactory;
    protected $table = 'pengesahans';
    protected $fillable = ['jabatan', 'prioritas', 'sumberable_type', 'sumberable_id'];

    public function pengajuanSurats() : HasMany {
        return $this->hasMany(PengajuanSurat::class);
    }

    public function sumberable() : MorphTo {
        return $this->morphTo();
    }

    public function scopeWithSumberableRelations($query)
    {
        return $query->with([
            'sumberable' => function (MorphTo $morphTo) {
                $morphTo->morphWith([
                    \App\Models\Dosen::class => ['user'],
                    \App\Models\Pengurus::class => ['mahasiswa.user'],
                ]);
            }
        ]);
    }
}
