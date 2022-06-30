<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Etudiant;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ExamenController extends Controller
{

    public static function dayBetweenTwoDates() {
        $examen = Examen::all();

        foreach($examen as $ex){
            if($ex->etat == false){
                $ouvert = $ex ->dateOuverture;
                $sysdate = new DateTime() ;
                $timeOuvert = new DateTime($ouvert) ;
                $deferenceBetween = $sysdate->diff($timeOuvert) ;
                
                $daysBetween = $deferenceBetween->format('%a') ;
                // ouverture automatique de l'examen
                if (Str::contains(ExamenController::dayBetweenTwoDatesFermerture(), "l'inscription n'est pas encore ouvert !") && $ex->etat == true){
                    $ex->etat = false ;
                    $ex->save() ;
                    return "L'inscription est déjà expirer :/" ;
                }else{ 
                if ($daysBetween == 0 && ExamenController::dayBetweenTwoDatesFermerture() != 0  ){
                    $ex->etat = true ;
                    $ex->save() ;
                    return "Examen deja ouvert";
                }
                else
                return $daysBetween ;
            }
            }else
            return "Examen deja ouvert";
        }
    }

    /**
     * public int differenceEntredate(Calendar dateDebut1, Calendar dateFin1) {
        int cptJours = 0;
        while (!dateDebut1.after(dateFin1)) {
            dateDebut1.add(Calendar.DAY_OF_MONTH, 1);
            cptJours++;
        }
        if (cptJours > 0) {
            cptJours = cptJours - 1;
        }
        return cptJours;
        }
     */

    public static function dayBetweenTwoDatesFermerture() {
        $examen = Examen::all() ;
        foreach ($examen as $ex) {
            if ($ex->etat == true) {
                $ferm = $ex ->dateFermeture;
                $sysdate = new DateTime() ;
                $timeFerm = new DateTime($ferm) ;
                $deferenceBetween = $timeFerm->diff($sysdate) ;
                $daysBetween = $deferenceBetween->format('%a') ;
                if ($daysBetween == 0 || Str::contains(ExamenController::dayBetweenTwoDates(),"L'inscription est déjà expirer :/"))
                    return "l'inscription n'est pas encore ouvert !" ;
                    else
                    return $daysBetween ;
            }
            else {
                    if ($ex->etat == true){
                        // fermeture automatique de l'examen !
                        $ex->etat = false ;
                        $ex->save() ;
                    }
                    else {
                        return "l'inscription n'est pas encore ouvert !" ;
                    }
            }
        } }
    /*
    */
    public function index()
    {
        $examen = Examen::all();
        foreach($examen as $ex){
            if($ex->etat == true){
                return view('inscription.home', compact('examen')) ;
            }
        }
        return view('errors.500') ;
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
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public static function edit($id)
    {
        
    }

    public function update($id)
    {
        $etudiant = new Etudiant() ;
        $etudiant = Auth::user()->etudiant;
        $etudiant->update() ;
        ///$etudiant = Etudiant::select()->join('users' ,'users.id' ,'=' ,'etudiant.id_etudiant')->get() ;
        //dd($etudiant) ; 
        $etudiant->id_exame = 0 + $id ;
        $etudiant->Student_Matricule = md5(md5(md5(Str::random(30))));
        //dd($etudiant->getKey()) ;
        $etudiant->save() ;
        //$message = 'success' ;
        return redirect('home')->with('message' ,'inscription valide');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function InscrireEtudiant($id)
    {

        $etudiant = new Etudiant() ;
        $etudiant = Auth::user()->etudiant;
        $etudiant->update() ;
        ///$etudiant = Etudiant::select()->join('users' ,'users.id' ,'=' ,'etudiant.id_etudiant')->get() ;
        //dd($etudiant) ; 
        $etudiant->id_exame = 0 + $id ;
        $etudiant->Student_Matricule = md5(md5(md5(Str::random(30))));
        //dd($etudiant->getKey()) ;
        $etudiant->save() ;
        return redirect('home');

        
        /*$etudiant = new Etudiant() ;
        $etudiant = Auth::user()->etudiant->find();
        ///$etudiant = Etudiant::select()->join('users' ,'users.id' ,'=' ,'etudiant.id_etudiant')->get() ;
        //dd($etudiant) ; 
        $etudiant->id_exame = $id ;
        $etudiant->Student_Matricule = md5(md5(md5(Str::random(30))));
        $etudiant->save() ;
        return view('home.home');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examen $examen)
    {
        //
    }
}
