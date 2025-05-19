<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['quote', 'title', 'gambar', 'status', 'user_id'];

    protected $casts = [
        'title' => 'array',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
