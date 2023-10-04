<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cour extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomCours',
        'description',
        'image',
        'ressource',
        'module_id',
    ];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}
