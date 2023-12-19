<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TacheStagiaire;
use App\Models\TacheFile;

class ActualiteController extends Controller
{
    public function index()
    {
        $tachesStagiaires = TacheStagiaire::with(['stagiaire', 'cour'])->latest()->paginate(10);
        $tacheFiles = TacheFile::latest()->get();

        return view('actualites.index', compact('tachesStagiaires', 'tacheFiles'));
    }


}
