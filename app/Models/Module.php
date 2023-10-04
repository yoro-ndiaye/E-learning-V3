<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomModule',
        'description',
        'image',
        'domaine_id',
    ];
    
    public function domaine():BelongsTo
    {
        return $this->belongsTo(Domaine::class);
    }

    public function cours():BelongsToMany
    {
        return $this->belongsToMany(Cour::class);
    }
}
