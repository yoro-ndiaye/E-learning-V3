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

 
    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class, 'stagiaire_id');
    }

    public function cour()
    {
        return $this->belongsTo(Cour::class, 'cour_id');
    }

    public function tacheFiles()
    {
        return $this->hasMany(TacheFile::class, 'tache_stagiaires_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
