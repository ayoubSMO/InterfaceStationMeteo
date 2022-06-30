<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant_module', function (Blueprint $table) {
            $table->unsignedBigInteger('id_etudiant');
            $table->unsignedBigInteger('id_module') ;
            $table->foreign('id_etudiant')->references('id_etudiant')->on('etudiant')->onDelete('cascade')->onUpdate('cascade') ;
            $table->foreign('id_module')->references('id_module')->on('module')->onDelete('cascade')->onUpdate('cascade') ;
            $table->primary(['id_etudiant','id_module']) ;
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
        Schema::dropIfExists('etudiant_module');
    }
}