<?php

namespace App\Models;

use App\Models\TacheStagiaire;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stagiaire extends Authenticatable
{
    use HasFactory,HasApiTokens,Notifiable;


    protected $guard='stagiaire';
    protected $fillable = ['domaine_id',
                            'prenoms',
                             'nom',
                             'sexe',
                             'date_naissance',
                             'lieu_naissance',
                             'adresse',
                             'telephone',
                             'photo',
                             'email',
                             'password'
    ];


    public function domaine():BelongsTo
    {
        return $this->belongsTo(Domaine::class);
    }
    public function tacheStagiaire(){
        return $this->hasMany(TacheStagiaire::class);
    }

     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'password' => 'hashed',
    ];
}
