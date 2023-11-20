<?php

namespace App\Models;

use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomDomaine',
        'description',
    ];

    public function modules():BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
    public function stagiaires():BelongsToMany
    {
        return $this->belongsToMany(Stagiaire::class);
    }
}
