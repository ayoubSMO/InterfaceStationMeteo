<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reclamation;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant = Auth::user()->etudiant ;
        
        return view('reclamation.main' ,compact('etudiant')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reclamation = new Reclamation() ;
        return $reclamation ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $reclamation = new Reclamation() ;
        $etudiant = new Etudiant() ;
        $reclamation->description = $request->input('description');
        $reclamation->id_etudiant = Auth::user()->etudiant->id_etudiant ;
        $etudiant = Auth::user()->etudiant ;
        $reclamation->save() ;
        $etudiant->id_reclamation = $reclamation->id_reclamation ;
        $etudiant->save() ;

        return redirect('home')->with('message_reclamation');
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

    public function envoiReclamationSituationPedagogique ($id){
        $reclamation = Reclamation::where('id_reclamation' ,$id) ;
        dd($reclamation) ;
        $reclamation->store() ;
        
        return redirect('home')->with('message_reclamation');
    }
}
