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
    protected $fillable = ['quote', 'title', 'status', 'penguruses_id'];

    protected $casts = [
        'title' => 'array',
    ];

    public function pengurus() : BelongsTo
    {
        return $this->belongsTo(Pengurus::class, 'penguruses_id');
    }
    
}
