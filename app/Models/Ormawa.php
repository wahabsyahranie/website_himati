<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    protected $table = 'ormawas';
    protected $fillable = ['nama_pendek', 'lambang', 'user_id'];
}
