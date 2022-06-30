<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Etudiant ;

    $testForeinKey = Etudiant::all() ;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        for ($i = 0 ; $i < 10 ; $i ++){
        DB::table('Filiere')->insert([
            'Nom_Filiere' => Str::random(10),
        ]);
    }
        //Filiere::factory()->count(2)->create(); 
    }
}