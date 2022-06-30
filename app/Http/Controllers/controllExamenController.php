<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class controllExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $examen = Examen::all() ;
        $message = null ;
        return view('admin.examen.controll',compact('examen' ,'message')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* creation d'un examen */
    public function create(Request $request)
    {
        // Input data from la page 

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $message = null ;
        $inputDateOuverture = new DateTime($request->input('dateOuverture')) ;
        $inputDateFermeture = new DateTime($request->input('dateFermeture')) ;
        $difference = $inputDateOuverture->diff($inputDateFermeture) ;
        //dd(strtotime($difference));
        /*if ($inputDateOuverture){
            dd("hello") ;
        }*/
        $examen = Examen::where('id_examen' ,$id)->first() ;
        $examen->dateOuverture = $inputDateOuverture;
        $examen->dateFermeture = $inputDateFermeture;
        if($request->input('ouvertureFermeture') == 'on')
            $examen->etat = true;
        else
            $examen->etat = false ;
        $message = 'message_updateExamen' ;
        $examen->save() ;
        return redirect('home')->with('message_updateExamen');
    }

    public function updateExamen($id)
    {
        dd($id) ;
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
