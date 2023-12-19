<?php

namespace App\Http\Controllers\Actualites;

use App\Http\Controllers\Controller;
use App\Models\TacheStagiaire;
use App\Models\TacheFile; 
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(TacheStagiaire $tacheStagiaire)
    {
        $tacheFiles = TacheFile::where('tache_stagiaires_id', $tacheStagiaire->id)->get();
        return view('actualites.details.show', compact('tacheStagiaire', 'tacheFiles'));
    }
}
