<?php

use App\Http\Controllers\addEtudiantController;
use App\Http\Controllers\stationController ;
use App\Http\Controllers\addExamenController;
use App\Http\Controllers\addModuleEtudiantController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\DownloadConvocationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EtudiantInscrieController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\EtudiantFiliereController ;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\controllExamenController ;
use App\Http\Controllers\controllConvocationController ;
use App\Models\Etudiant ;
use App\Models\Examen ;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    $etudiant = Etudiant::all();
    $examen = Examen::all() ;
    $resultatOuverture = ExamenController::dayBetweenTwoDates() ;
    $resultatFermeture = ExamenController::dayBetweenTwoDatesFermerture() ;
    $resultatOuvertureConvo = ConvocationController::dayBetweenTwoDates() ;
    $resultatFermetureConvo = ConvocationController::dayBetweenTwoDatesFermerture() ;
    return view('home.home' ,compact('etudiant' ,'resultatOuverture' ,'resultatFermeture','examen' ,'resultatOuvertureConvo' ,'resultatFermetureConvo'));
})->name('home.home');

Route::middleware(['auth:sanctum', 'verified'])->get('/home2', function () {
    $etudiant = Etudiant::all();
    $stationValue = stationController::class;
    
    return view('home.home2' ,compact('etudiant'));
})->name('home.home2');



/* Route::middleware(['auth:sanctum', 'verified'])->get('/examen', function () {
    $examen = Examen::all() ;
    $etudiant = Auth::user()->etudiant ;
    foreach ($examen as $examen){
        if ($examen->etat == true){
            return view('inscription.home',compact('examen' ,'etudiant')) ;
        }else {
            return view('errors.500') ;
        }
    }
})->name('inscription.home');*/

Route::resource('etudiant_Exam', EtudiantInscrieController::class);

Route::resource('filiere', FiliereController::class);   

Route::resource('EtudiantInFiliere', EtudiantFiliereController::class);

Route::group(['middleware' => ['auth']] , function() {
    Route::group(['middleware' => ['role:Etudiant']], function() {
    Route::PUT('/examen/{$id}' ,[ExamenController::class,'InscrireEtudiant']);
    Route::resource('/examen', ExamenController::class);
    Route::resource('profile',EtudiantController::class);
    Route::PUT('/reclamation/{$id}' ,[ReclamationController::class,'envoiReclamationSituationPedagogique']);
    Route::resource('reclamation', ReclamationController::class);
    Route::get('/convocation' ,[DownloadConvocationController::class ,'downloadConvocation']) ;
    });
});

Route::group(['middleware' => ['auth']] , function() {
Route::group(['middleware' => ['role:administration']], function() {
    Route::resource('/controllExamen',controllExamenController::class);
    Route::resource('/controllConvocation',controllConvocationController::class);
    Route::resource('/createExamen',addExamenController::class);
    Route::resource('/createEtudiant',addEtudiantController::class);
    Route::resource('/ajouterListeModuleEtudiant',addModuleEtudiantController::class);
});
});
Route::resource('/admin', AdminController::class);
