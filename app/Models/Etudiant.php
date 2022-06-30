<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Etudiant extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'etudiant' ;
    protected $primaryKey = 'id_etudiant';
    public $incrementing = false;
    protected $fillable = [
        'Student_Matricule',
        'Appogee',
        'CIN',
        'Nom',
        'Prenom',
        'Semestre',
        'date de naissance',
        'photo',
        'telephone',
        'email',
        'id_reclamation',
    ];// end of fillable

    protected $hidden = [
        'Student_Matricule',
        'remember_token',
    ];// end of hidden

    public function examen(){
        return $this->hasMany('App\Models\Examen') ;
    }// end of examen

    public function reclamation()
    {
        return $this->belongsTo('App\Models\Reclamation') ;
    }// end of reclamation

    public function user()
    {
        return $this->belongsTo('User')->belongTo('App\Models\Filiere') ;
    }//end of user

    public function filiere() {
        return $this->belongsTo('App\Models\Filiere') ;
    }// end of filiere

    public function modules() {
        return $this->belongsToMany('App\Models\Module') ;
    }
}