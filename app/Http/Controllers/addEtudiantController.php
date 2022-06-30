<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Filiere;
use App\Models\Module;
use App\View\Components\Forms\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Concat;

class addEtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.etudiant.create') ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudiant = new Etudiant() ;
        return $etudiant ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->file('image') ;
        $fileName = $input->getClientOriginalName() ;
        $destinationPath = 'C:\xampp_new\htdocs\laravel_INSCRIPTION\PFE_APP_V4\laravel_inscription\public\image\\';
        $modifyDestinationPath = substr_replace($destinationPath ,"", -1);
        $fileName = md5($fileName) ;
        $input->move($modifyDestinationPath,$fileName);

        $etudiant = new Etudiant() ;
        $etudiantUser = new User() ;
        $nomFiliere = $request->input('filiere') ;
        $users = User::all() ;
        $id_user = rand(1,20000);
        $listIdUsers = array() ;
        foreach($users as $users){
            $listIdUsers[] = $users->id ;
        }

        while(true){
            if (in_array($id_user ,$listIdUsers) == true){
                $id_user = rand(1,20000) + 10 ;
            }
            else
                break ;
        }

        $etudiant->appogee = $request->input('appogee') ;
        dd($etudiant) ;
        $etudiantUser->appogee = $request->input('appogee') ;
        $etudiant->CIN = $request->input('CIN') ;
        $etudiantUser->email = $request->input('CIN') ;
        $etudiant->Nom = $request->input('Nom') ;
        $etudiant->Prenom = $request->input('Prenom') ;

        $NomComplet = $request->input('Nom') ." ". $request->input('Prenom') ;
        $etudiantUser->Name = $NomComplet ;
        $etudiant->email = $request->input('Email') ;
        $etudiant->telephone = $request->input('telephone') ;
        $etudiant->date_de_naissance = $request->input('date_de_naissance') ;
        $etudiantUser->id = $id_user ;
        $etudiant->user_id = $id_user ;
        $etudiantUser->date_de_naissance = $etudiant->date_de_naissance ;
        $etudiantUser->password = Hash::make($request->input('date_de_naissance')) ;
        $etudiant->id_filiere = Filiere::select('id_filiere')->where('Nom_Filiere',$nomFiliere)->first()->id_filiere;
        $etudiant->photo = $fileName;

        $etudiantUser->save() ;
        $etudiant->save() ;

        //return view('admin.etudiant.remplirListeModule')->with('etudiant',$etudiant) ;
        return view('admin.etudiant.remplirListeModule')->with('etudiant',$etudiant) ;
    }

    public function getListeIdUsers(User $users)
    {
        $listIdUsers = array() ;

        foreach($users as $users){
            $listIdUsers[] = $users->id ;
        }
        return $listIdUsers ;
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
