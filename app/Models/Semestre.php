<?php

namespace App\Models;

use Carbon\Traits\Modifiers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory ,Modifiers;

    protected $table = 'semestre' ;


    public function module()
    {
        return $this->belongsToMany('App\Module') ;
    }// end of modules
}
