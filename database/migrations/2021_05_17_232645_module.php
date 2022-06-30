<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Module extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('semestre', function (Blueprint $table) {
            $table->id('id_semestre'); 
            $table->string('nom_semestre') ;
            $table->timestamps();
        });

        Schema::create('module', function (Blueprint $table) {
        $table->id('id_module')->unique() ;
        $table->string('nom_module') ;
        $table->unsignedBigInteger('id_filiere') ;
        $table->unsignedBigInteger('id_semestre') ;
        $table->foreign('id_filiere')->references('id_filiere')->on('filiere')->onUpdate('cascade')->onDelete('cascade') ;
        $table->foreign('id_semestre')->references('id_semestre')->on('semestre')->onUpdate('cascade')->onDelete('cascade') ;
        $table->primary(['id_filiere','id_semestre']) ;
        $table->timestamps();*
    });*/
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
