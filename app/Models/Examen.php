<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Examen extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'examen' ;
    protected $primaryKey = 'id_examen';
    public $incrementing = false;
    
    protected $fillable = [
        'saison',
        'session',
        'Année_universitaire',
        'dateOuverture',
        'dateFermeture',
        'etat',
    ];

    public function etudiant()
    {
        return $this->belongsToMany('App\Models\Etudiant') ;
    }

    
    
}
