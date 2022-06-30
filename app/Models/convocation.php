<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocation extends Model
{
    use HasFactory;

    protected $table = 'convocation' ;
    protected $primaryKey = 'id_convocation';
    public $incrementing = false;

    public function etudiant() {
        return $this->belongsTo('App\Models\Etudiant') ;
    }
}
