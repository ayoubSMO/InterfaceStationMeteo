<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('convocation', function (Blueprint $table) {
            $table->id('id_convocation');
            $table->string('Année_universitaire');
            $table->dateTime('dateOuverture') ;
            $table->dateTime('dateFermeture') ;
            $table->boolean('etat')->default(false);
            $table->timestamps();
        });*/// end of creation table convocation
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convocation');
    }
}
