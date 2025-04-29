<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'mahasiswas';
    protected $fillable = ['nim', 'nama', 'email', 'password', 'tahun_masuk', 'nomor_telepon', 'prodi'];
    

}
