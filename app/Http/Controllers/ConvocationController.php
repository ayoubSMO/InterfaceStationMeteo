<?php

namespace App\Http\Controllers;

use App\Models\convocation;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function dayBetweenTwoDates() {
        $convocation = convocation::all();

        foreach($convocation as $ex){
            if($ex->etat == false){
                $ouvert = $ex ->dateOuverture;
                $sysdate = new DateTime() ;
                $timeOuvert = new DateTime($ouvert) ;
                $deferenceBetween = $sysdate->diff($timeOuvert) ;
                $daysBetween = $deferenceBetween->format('%a') ;
                // ouverture automatique de l'examen
                if ($daysBetween == 0 && ConvocationController::dayBetweenTwoDatesFermerture() != 0  ){
                    $ex->etat = true ;
                    $ex->save() ;
                    return 'telechargement de la convocation deja ouvert ';
                }
                else{    
                if (ConvocationController::dayBetweenTwoDatesFermerture() == 0){
                    $ex->etat = false ;
                    $ex->save() ;
                        return "Telechargement est déjà expirer :/" ;
                }
                return $daysBetween ;
            }
            
            }else
            return 'Telechargement deja ouvert ';
        }
    }

    public static function dayBetweenTwoDatesFermerture() {
        $convocation = convocation::all() ;
        foreach ($convocation as $ex) {
            if ($ex->etat == true) {
                $ferm = $ex ->dateFermeture;
                $sysdate = new DateTime() ;
                $timeFerm = new DateTime($ferm) ;
                $deferenceBetween = $timeFerm->diff($sysdate) ;
                $daysBetween = $deferenceBetween->format('%a') ;
                if ($daysBetween == 0 && Str::contains(ConvocationController::dayBetweenTwoDates(),"Telechargement est déjà expirer :/"))
                    return "Telechargement n'est pas encore ouvert !" ;
                return $daysBetween ;
            }
            else {
                    if ($ex->etat == true){
                        // fermeture automatique de l'examen !
                        $ex->etat = false ;
                        $ex->save() ;
                    }
                    else{
                        return "Telechargement n'est pas encore ouvert !" ;
                    }
            }
        } 
    }

    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function show(convocation $convocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function edit(convocation $convocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, convocation $convocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(convocation $convocation)
    {
        //
    }
}
