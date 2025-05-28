<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TandatanganDigital extends Model
{
    use HasFactory;
    protected $table = 'tandatangan_digitals';
    protected $fillable = ['pengesahan_id', 'pengajuan_surat_id', 'nomor_registrasi', 'link', 'status'];

    public function pengesahans() : BelongsTo {
        return $this->belongsTo(Pengesahan::class, 'pengesahan_id');
    }

    public function pengajuan_surats() : BelongsTo {
        return $this->belongsTo(PengajuanSurat::class, 'pengajuan_surat_id');
    }
}
