<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cour;
use App\Models\Module;
use App\Models\Domaine;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StagiaireController extends Controller
{
    public function index(){

        $stagiaire=Stagiaire::all();
        $counts = DB::table('stagiaires')
        ->join('domaines', 'domaines.id', '=', 'stagiaires.domaine_id')
        ->select('domaines.nomDomaine', DB::raw('count(*) as count'))
        ->groupBy('domaines.nomDomaine')
        ->get();



$data=[
    'stagiaire'=>$stagiaire,
    'count'=>$counts
];

        return view('stagiaire.index', $data);
    }

    public function create(){

        $domaine=Domaine::all();
        return view('stagiaire.create',compact('domaine'));
    }

    public function store(Request $request){
        $request->validate([
            'prenoms'=>'required',
            'nom'=>'required',
            'email'=>'required',
            'domaine_id'=>'required',

        ]);
        $stagiaire=new Stagiaire;
        $stagiaire->prenoms=$request->prenoms;
        $stagiaire->nom=$request->nom;
        $stagiaire->sexe=$request->sexe;
        $stagiaire->email=$request->email;
        $stagiaire->domaine_id=$request->domaine_id;

        $stagiaire->save();

        return redirect()->route('stagiaires.index');
    }


    //connection

    public function indexlogin() {
        return view('stagiaire.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);


        $check=$request->all();

        if(Auth::guard('stagiaire')->attempt(['email'=>$check['email'],
                                            'password'=>$request->password])){



            return redirect()->route('stagiaires.dashboard', )->with('success', 'Connexion reussie');
        }else{
            return back()->with('error', 'email ou Mot de passe incorrecte');
        }



    }


public function dashboard(){
    return view('stagiaire.dashboard');
}
public function logout(){
    Auth::guard('stagiaire')->logout();
    return redirect()->route('stagiaires.login_form');
}
public function module($id){
    $modules=Module::where('domaine_id', $id)->get();

    //dd($module);
    return view('stagiaire.module', compact('modules'));
}
public function cours($id){
    $cours=Cour::where('module_id', $id)->get();
    $modules=Module::find($id);


    return view('stagiaire.cours', compact('cours','modules'));
}

public function showStagiaire($id){
    $stagiaire=Stagiaire::find($id);
   // dd($stagiaire->domaine->nomDomaine);
    $tacheStagiaires = DB::table('tache_stagiaires')
    ->join('tache_files', 'tache_stagiaires.id', 'tache_files.tache_stagiaires_id')
    ->join('cours', 'cours.id', 'tache_stagiaires.cour_id')
    ->where('tache_stagiaires.stagiaire_id', $id)
    ->select('tache_stagiaires.*', 'cours.*', 'tache_files.*')
    ->orderby('tache_stagiaires.id', 'desc')
    ->get();

    return view('stagiaire.showStagiaire', compact('stagiaire','tacheStagiaires'));
}

public function update($id){
    $domaine= Domaine::all();
    $stagiaire=Stagiaire::find($id);

    return view('stagiaire.update', compact('stagiaire','domaine'));

}

public function editStagiaire(Request $request){
    $request->validate([
        'prenoms'=>'required',
        'nom'=>'required',
        'email'=>'required',
        'domaine_id'=>'required',
    ]);
    $stagiaire=Stagiaire::find($request->id);
    $stagiaire->prenoms=$request->prenoms;
    $stagiaire->nom=$request->nom;
    $stagiaire->sexe=$request->sexe;
    $stagiaire->email=$request->email;
    $stagiaire->domaine_id=$request->domaine_id;
    $stagiaire->save();

    return redirect()->route('stagiaires.index');

}
}
