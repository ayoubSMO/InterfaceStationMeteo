<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant_module extends Model
{
    use HasFactory;

    protected $table = 'etudiant_module' ;
    protected $primaryKey = ['id_etudiant','id_module'];
    public $incrementing = false;

    

}
