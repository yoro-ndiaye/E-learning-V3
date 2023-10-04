<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    public function index(){
        $domaine=Domaine::all();
        return view('domaines.index',compact('domaine'));
    }
    public function create(){
        return view('domaines.create');
    }

    public function store(Request $request){
        $request->validate([
            'nomDomaine' => 'required',
            'description' => 'required',
        ]);
        $domaine=new Domaine();
        $domaine->nomDomaine=$request->nomDomaine;
        $domaine->description=$request->description;
      
        $domaine->save();

        return redirect()->route('domaines.index');
    }
    public function addmodule($id){
        $domaine=Domaine::find($id);
        return view('domaines.addmodule',compact('domaine'));
    }

    public function update($id){
        $domaine=Domaine::find($id);
        return view('domaines.update',compact('domaine'));
    }

    public function edit(Request $request){
        $domaine=Domaine::find($request->id);
        $domaine->nomDomaine=$request->nomDomaine;
        $domaine->description=$request->description;
        $domaine->save();
        return redirect()->route('domaines.index');
    }
    public function delete($id){
        $domaine=Domaine::find($id);
        $domaine->delete();
        return redirect()->route('domaines.index');
    }
}

