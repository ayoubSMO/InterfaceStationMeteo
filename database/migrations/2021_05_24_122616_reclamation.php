<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reclamation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamation', function (Blueprint $table) {
            $table->id('id_reclamation') ;
            $table->unsignedBigInteger('id_etudiant')->unique() ;
            $table->foreign('id_etudiant')->references('id_etudiant')->on('etudiant')->onUpdate('cascade')->onDelete('cascade') ;
            $table->text('description');
            $table->timestamps();
        });
    }// end of up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamation');
    }// end of down 
}
