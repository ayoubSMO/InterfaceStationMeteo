<?php

namespace App\Http\Controllers;

use App\Models\Etudiant as ModelsEtudiant;
use App\Models\etudiant_module;
use App\Models\Module;
use App\Models\Etudiant;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class addModuleEtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.etudiant.remplirListeModule') ;
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
    public function store(Request $request)
    {   $appogee = $request->input('appogee');
        $listModuleCocher = $request->input('modules') ;
        //dd($appogee) ;
        foreach($listModuleCocher as $listModuleCocher){
           // dd($appogee) ;
            $id_module = Module::select('id_module')->where('nom_module',$listModuleCocher)->first()->id_module;
            $etudiant_module = new etudiant_module() ;
            $id_etudiant = Etudiant::select('id_etudiant')->where('Appogee' ,$appogee)->first()->id_etudiant ;

            $etudiant_module->id_etudiant = $id_etudiant ;
            $etudiant_module->id_module = $id_module ;
            $etudiant_module->save() ;
        }

        return redirect('home') ;

    }

    public function getIdEtudiantFromAppogee($appogee)
    {
        $idEtudiant = Etudiant::where('Appogee' ,$appogee)->first()->id_etudiant ;

        return $idEtudiant ;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
