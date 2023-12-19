<?php

namespace App\Models;

use App\Models\TacheStagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TacheFile extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'path',
    ];

    public function tacheStagiaire()
    {
        return $this->belongsTo(TacheStagiaire::class, 'tache_stagiaires_id');
    }
}
