<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
                             'mot_de_passe'
    ];


    public function domaine():BelongsTo
    {
        return $this->belongsTo(Domaine::class);
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
