<?php

namespace App\Models;

use Carbon\Traits\Modifiers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory ,Modifiers;


    protected $table = 'filiere' ;
    protected $primaryKey = 'id_filiere';
    public $incrementing = false;

    public function modules()
    {
        return $this->hasMany('App\Module') ;
    }// end of modules

    public function users() {
        return $this->belongsToMany('User') ;
    }
}
