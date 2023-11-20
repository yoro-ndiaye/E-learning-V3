<?php

namespace App\Models;

use App\Models\TacheFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TacheStagiaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'stagiaire_id',
        'cour_id',
        'tachefile',
        'tacheURL',
        'tacheDescription'
    ];

    public function stagiaire():BelongsTo
    {
        return $this->belongsTo(Stagiaire::class);
    }

    public function cour():BelongsTo
    {
        return $this->belongsTo(Cour::class);
    }

    public function tachefiles():BelongsToMany
    {
        return $this->belongsToMany(TacheFile::class);
    }
}
