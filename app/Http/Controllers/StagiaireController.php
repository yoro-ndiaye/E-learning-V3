<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Cour;
use App\Models\Module;
use App\Models\Domaine;
use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StagiaireController extends Controller
{
    public function index(){

        $stagiaire=Stagiaire::all();
        return view('stagiaire.index', compact('stagiaire'));
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

        // $user=Stagiaire::where('email', $request->email)->first();
        // if($user){
        //     if (Hash::check($request->password, $user->mot_de_passe)){
        //         return redirect()->route('stagiaires.dasboard');
        //     }else{
        //         return redirect()->route('stagiaires.login_form')->with('error', 'Mot de passe incorrecte');
        // }

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
}
