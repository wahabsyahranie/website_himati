<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TujuanSurat extends Model
{
    protected $table = 'tujuan_surats';
    protected $fillable = ['tujuan'];

    public function pengajuan_surats() {
        $this->hasMany(PengajuanSurat::class);
    }
}
