<?php

namespace App\Models;

use Carbon\Traits\Modifiers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory ,Modifiers;

    protected $table = 'reclamation' ;
    protected $primaryKey = 'id_reclamation';
    public $incrementing = true;

    public function etudiant() {
        return $this->belongsTo('App\Models\Etudiant') ;
    }
}