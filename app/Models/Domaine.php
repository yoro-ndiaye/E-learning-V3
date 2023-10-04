<?php

namespace App\Models;

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
}
