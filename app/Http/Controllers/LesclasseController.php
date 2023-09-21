<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class LesclasseController extends Controller
{

    public function index()
    {
    
        $data['title'] = 'Gestion des Classes';
        $data['lesclasses'] = Classe::paginate(5);
        return view('classes.index',$data);
    }

    public function store(Classe $lesclasse ,Request $request)
    {

    $request->validate([
        'classe' => 'required'
    ]);
        
    Classe::create([
            'classe' =>$request->classe,
           ]);
           return redirect('/classe/index')->with('success', 'Cette Classe est Ajouté avec succès');
    }

    public function delete(Request $request)
    {
        $lesclasse = Classe::find($request->classe_id);
        $lesclasse->delete();
        
        return redirect('/classe/index')->with('success','Cette Classe est supprimer !');
    }
}
