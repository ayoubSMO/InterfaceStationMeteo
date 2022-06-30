<?php

namespace App\Http\Controllers;

use App\Models\convocation;
use Illuminate\Http\Request;

class controllConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocation = Convocation::all() ;

        return view('admin.convocation.controll')->with('convocation',$convocation) ;
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
        $convocation = convocation::where('id_convocation' ,$id)->first() ;
        $convocation->dateOuverture = $request->input('dateOuverture');
        $convocation->dateFermeture = $request->input('dateFermeture');
        if($request->input('ouvertureFermeture') == 'on')
            $convocation->etat = true;
        else
            $convocation->etat = false ;

        $convocation->save() ;

        return redirect('home')->with('message_updateConvocation');
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
