<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['stagiaire'];

    protected $fillable = [
        'content',
        'tacheStagiaire_id',
        'stagiaire_id'
    ];

    public function stagiaire(): BelongsTo
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
