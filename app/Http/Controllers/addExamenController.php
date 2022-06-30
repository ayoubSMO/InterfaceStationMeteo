<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

class addExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.examen.createExamen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examen = new Examen() ;

        return $examen ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examen = new Examen() ;
        $saison = $request->input('saison') ;
        $session = $request->input('session') ;
        $etat = $request->input('ouvertureFermeture') ;
        if($saison == 1) {
            $saison = 'PRINTEMPS' ;
        }
        else
            $saison = 'AUTOMNS' ;

        if($session == 1) {
            $session = 'rattrappage' ;
        }
        else
            $session = 'normal' ;
        
        if($etat == 'on') {
            $etat = true ;
        }
        else
            $etat = false ;

        $examen->saison = $saison ;
        $examen->session =  $session;
        
        $examen->Année_universitaire = $request->input('Année_universitaire') ;
        $examen->dateOuverture = $request->input('dateOuverture') ;
        $examen->dateFermeture = $request->input('dateFermeture') ;
        $examen->etat = $etat ;
        $examen->save() ;

        return redirect('home') ;
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
    public function update(Request $request)
    {
        $examen = new Examen() ;
        dd("hello") ;
    }

    public function CreateExamen(Request $request)
    {
        # code...
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
