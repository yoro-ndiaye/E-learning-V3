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
        $credentials = $request->only('email', 'password');
        $stagiaire = DB::table('stagiaires')->where('email', $credentials['email'])->first();

        $check=$request->all();
        if ($stagiaire && $this->isUserActive($stagiaire)) {

            if (Auth::guard('stagiaire')->attempt($credentials)) {
                return redirect()->route('stagiaires.dashboard')->with('success', 'Connexion réussie');
            } else {
                return back()->with('error', 'Email ou mot de passe incorrect');
            }
        } else {
            // L'utilisateur n'est pas actif, rediriger avec un message d'erreur
            return back()->with('error', 'L\'utilisateur n\'est pas actif. Veuillez contacter le support.');
        }


    }

    // pour verifier si l'utilisateur est actif
    public function isUserActive($user)
    {
        if($user->status == 0){
            return false;
        }else{
            return true;
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


    // Recupere le stagiaire connecté
    $stagiaireConnecte = Auth::guard('stagiaire')->user(); 
    //recupere l'id du stagiaire connecté
    $stagiaire =  $stagiaireConnecte->id;
    //recuperation les cours terminés
    $coursDuStagiaire = Cour::where('module_id', $id)
    ->where('etat', 'terminé')
    ->count();
//recuperation du nombre de cours en fonction des modules
    $nbrcours = Cour::where('module_id', $id)->count();
    //on verifie si le nbre de cours total est different de zero
    if($nbrcours != 0){
        $pourcentageProgression = round(($coursDuStagiaire*100)/$nbrcours);
    }else{
        $pourcentageProgression = 0;
    }
    //dd($pourcentageProgression);
    return view('stagiaire.cours', compact('cours','modules','pourcentageProgression'));
}

public function showStagiaire($id){
    $stagiaire=Stagiaire::find($id);

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
public function edit($id){
    $stagiaire=Stagiaire::find($id);
    return view('stagiaire.edit', compact('stagiaire'));
}

public function updateProfil(Request $request){
    $stagiaire=Stagiaire::find($request->id);
    $stagiaire->date_naissance=$request->date_naissance;
    $stagiaire->lieu_naissance=$request->lieu_naissance;
    $stagiaire->adresse=$request->adresse;

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('photoprofil', $filename);
        $stagiaire->photo = $filename;
    }

    $stagiaire->save();
    return redirect()->route('stagiaires.dashboard');
}

public function changemotdepasse($id){
    $stagiaire=Stagiaire::find($id);
    return view('stagiaire.changemotdepasse', compact('stagiaire'));

}
public function updatepassword(Request $request){

    $stagiaire=Stagiaire::find($request->id);
    $oldPassword = $request->current_password;
    $newPassword = $request->password;
    $confirmpassword= $request->confirm_password;

    if (Hash::check($oldPassword, $stagiaire->password)) {
        // Mettre à jour le mot de passe

        if ($confirmpassword != $newPassword) {

            return redirect()->route('stagiaires.changemotdepasse',$request->id)->with('identique', 'Les mots de passe ne sont pas identiques.');
        }else {
            $stagiaire->password=Hash::make($newPassword);
            $stagiaire->save();
            return redirect()->route('stagiaires.dashboard')->with('success', 'Mot de passe mis à jour avec succès.');

    }
        // Rediriger avec un message de succès
        return redirect()->route('stagiaires.changemotdepasse',$request->id)->with('success', 'Mot de passe mis à jour avec succès.');
    } else {
        // Rediriger avec un message d'erreur
        return redirect()->route('stagiaires.changemotdepasse',$request->id)->with('errore', 'Ancien mot de passe incorrect.');
    }
}
public function etat($id){
    $stagiaire=Stagiaire::find($id);
    if ($stagiaire->status == 0) {
        $stagiaire->status = 1;
        $stagiaire->save();
    }else {
        $stagiaire->status = 0;
        $stagiaire->save();
    }
    return redirect()->route('stagiaires.index');
}
// resete mot de passe
public function resetmotdepasse($id) {
    $stagiaire=Stagiaire::find($id);
    $stagiaire->password = Hash::make('passer123');
    $stagiaire->save();
    return back()->with('success', 'Mot de passe mis à jour avec succès.');
}
public function updateEtat(Cour $cours)
{
    // Toggle entre "terminé" et "en cours"
    $nouvelEtat = ($cours->etat === 'terminé') ? 'en cours' : 'terminé';

    // Mise à jour de l'attribut "etat"
    $cours->update(['etat' => $nouvelEtat]);

    // Redirection ou réponse JSON en fonction de vos besoins
    return redirect()->back()->with('success', 'État mis à jour avec succès');
}
}



