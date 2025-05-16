<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['user_id', 'nim', 'prodi', 'tahun_masuk'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
