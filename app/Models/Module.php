<?php

namespace App\Models;

use Carbon\Traits\Modifiers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory ,Modifiers;

    protected $table = 'module' ;
    
    public function filiere()
    {
        return $this->belongsTo('App\Filiere') ;
    }// end of filiere

    public function semestre()
    {
        return $this->hasOne('App\Semestre'); 
    }// end of semestre*/

    public function etudiants(){
        return $this->belongsToMany('App\Models\Etudiant') ;
    }//

    
}
