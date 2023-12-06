<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Module;
use App\Models\TacheFile;
use Illuminate\Http\Request;
use App\Models\TacheStagiaire;
use App\Models\TemporalyImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TacheStagiaireController extends Controller
{

    public function gettache($id){

        return view('stagiaire.tacheStagiaire',compact('id'));

    }

    public function addfiletache(Request $request){

        // $validation=Validator::make($request->all(),[
        //     'tacheDescription'=>'required',

        // ]);
        // $temporaryImage = TemporalyImage::all();
        // if($validation->fails()){
        //         foreach ($temporaryImage as $image) {
        //             Storage::deleteDirectory('imagestmp/tmp/'.$image->folder);
        //             $image->delete();
        //         }


        //     return redirect()->back()->withErrors($validation)->withInput();
        // }
            $cour=Cour::find($request->cour_id);

        $tacheStagiaire=TacheStagiaire::create([
            'stagiaire_id'=>$request->stagiaire_id,
            'cour_id'=>$request->cour_id,
            'tacheDescription'=>$request->tacheDescription,
            'tacheURL'=>$request->tacheURL,

        ]);
        if ($request->hasFile('fichier')) {

            foreach ($request->file('fichier') as $file) {
            $fileName =time() .$file->getClientOriginalName();
            $tacheFile=new TacheFile();
            $tacheFile->tache_stagiaires_id=$tacheStagiaire->id;
            $tacheFile->name=$fileName;
            $tacheFile->path='uploads/';
            $file->move('uploads', $fileName);
            $tacheFile->save();
        }

    }else{
        $tacheFile=new TacheFile();
        $tacheFile->tache_stagiaires_id=$tacheStagiaire->id;
        $tacheFile->name="null";
        $tacheFile->path='uploads/';
        $tacheFile->save();
    }
        return redirect()->route('stagiaires.courstagiaire', $cour->module_id);

}

public function allfiletaches($id){
    $tacheStagiaires = DB::table('tache_stagiaires')
    ->join('tache_files', 'tache_stagiaires.id', 'tache_files.tache_stagiaires_id')
    ->join('cours', 'cours.id', 'tache_stagiaires.cour_id')
    ->where('tache_stagiaires.stagiaire_id', $id)
    ->select('tache_stagiaires.*', 'cours.*', 'tache_files.*')
    ->orderby('tache_stagiaires.id', 'desc')
    ->paginate(10);

    //   dd($tacheStagiaires);
    return view('stagiaire.allfiletaches',compact('tacheStagiaires'));
}

}
