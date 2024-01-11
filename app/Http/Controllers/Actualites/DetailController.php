<?php

namespace App\Http\Controllers\Actualites;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\TacheStagiaire;
use App\Models\TacheFile; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function show(TacheStagiaire $tacheStagiaire)
    {
        $comments = Comment::where('tacheStagiaire_id', $tacheStagiaire->id)->latest()->paginate(5);
        $tacheFiles = TacheFile::where('tache_stagiaires_id', $tacheStagiaire->id)->get();
        return view('actualites.details.show', compact('tacheStagiaire', 'tacheFiles','comments'));
    }

    public function comment(TacheStagiaire $tacheStagiaire, Request $request)
    {
        $validated = $request->validate([
            'comment' => ['required','string','between:2,255']
        ]);

        Comment::create([
            'content' => $validated['comment'],
            'tacheStagiaire_id' => $tacheStagiaire->id,
            'stagiaire_id' => Auth::guard('stagiaire')->user()->id
        ]);

        return back()->withStatus('Commentaire publié');
        
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', "commentaire supprimée avec succès");
    }
}
