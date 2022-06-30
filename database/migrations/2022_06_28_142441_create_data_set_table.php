<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_set', function (Blueprint $table) {
            $table->id();
            $table->Date('Date/heure') ;
            $table->float('Température moy') ;
            $table->float('Température max') ;
            $table->float('Radiation Solaire moy [W/m2]') ;
            $table->float('Humidité moy') ;
            $table->float('Humidité max') ;
            $table->float('Humidité min') ;
            $table->float('Precipitation Somme') ;
            $table->float('Vitesse Du Vent moy') ;
            $table->float('Vitesse Du Vent max') ;
            $table->float('Vitesse Du Vent min') ;
            $table->float('ETP quotidien [mm]') ;



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_set');
    }
}
