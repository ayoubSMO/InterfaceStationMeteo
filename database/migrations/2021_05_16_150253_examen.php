<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Examen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('module', function (Blueprint $table) {
            $table->unsignedBigInteger('id_module');
            $table->string('nom_module') ;
            $table->unsignedBigInteger('id_filiere') ;
            $table->unsignedBigInteger('id_semestre') ;
            $table->foreign('id_filiere')->references('id_filiere')->on('filiere')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('id_semestre')->references('id_semestre')->on('semestre')->onUpdate('cascade')->onDelete('cascade') ;
            $table->primary(['id_module','id_filiere','id_semestre']) ;
            $table->timestamps();
        });// end of creation table module

        
        Schema::create('Etudiant_Passe_Examen', function (Blueprint $table) {
            $table->unsignedBigInteger('id_examen') ;
            $table->unsignedBigInteger('id_etudiant') ;
            $table->unsignedBigInteger('id_module') ;
            $table->unsignedBigInteger('id_session');
            $table->date('date_examen') ;
            $table->string('salle') ;
            $table->string('bloc') ;
            $table->string('duree') ;
            $table->foreign('id_examen')->references('id_examen')->on('examen')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('id_etudiant')->references('id_etudiant')->on('etudiant')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('id_module')->references('id_module')->on('module')->onUpdate('cascade')->onDelete('cascade') ;
            $table->primary(['id_module','id_examen' ,'id_etudiant']) ;
            $table->timestamps();
        });// end of creation table Etudiant_Passe_Examen
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen');
        Schema::dropIfExists('semestre');
        Schema::dropIfExists('module');
        Schema::dropIfExists('filiere');
        Schema::dropIfExists('Etudiant_Passe_Examen');
        Schema::dropIfExists('Etudiant_Inscrie_Examen');
    }
}
