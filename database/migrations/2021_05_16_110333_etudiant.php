<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Etudiant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestre', function (Blueprint $table) {
            $table->id('id_semestre'); 
            $table->string('nom_semestre');
            $table->timestamps();
        });// end of creation table semestre

        Schema::create('convocation', function (Blueprint $table) {
            $table->id('id_convocation');
            $table->string('Année_universitaire');
            $table->dateTime('dateOuverture') ;
            $table->dateTime('dateFermeture') ;
            $table->boolean('etat')->default(false);
            $table->timestamps();
        });//end of creation table convocation

        Schema::create('examen', function (Blueprint $table) {
            $table->id('id_examen');
            $table->enum('session', ['NORMAL', 'RATRAPPAGE'])->default('NORMAL');
            $table->enum('saison', ['PRINTEMPS', 'AUTOMNS'])->default('AUTOMNS');
            $table->string('Année_universitaire');
            $table->dateTime('dateOuverture') ;
            $table->dateTime('dateFermeture') ;
            $table->boolean('etat')->default(false);
            $table->timestamps();
        });// end of creation table examen
        Schema::create('filiere', function (Blueprint $table) {
            $table->id('id_filiere') ;
            $table->string('Nom_Filiere') ;
            $table->timestamps();
        });// end of creation table filiere

        Schema::create('etudiant', function (Blueprint $table) {
            $table->id('id_etudiant') ;
            $table->string('Student_Matricule')->nullable()->unique() ;
            $table->integer('Appogee')->unique() ;
            $table->string('CIN')->unique() ;
            $table->string('Nom') ;
            $table->string('Prenom') ;
            $table->date('date_de_naissance');
            $table->string('photo')->unique() ;
            $table->string('telephone') ;
            $table->string('email')->unique();
            $table->unsignedBigInteger('id_reclamation')->default(0);
            $table->unsignedBigInteger('id_exame')->default(0) ;
            $table->unsignedBigInteger('id_filiere');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_convocation')->default(0);
            $table->foreign('id_filiere')->references('id_filiere')->on('filiere')->onUpdate('cascade')->onDelete('cascade') ;
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
    });// end of creation etudiant table

    Schema::create('etudiant_filier', function (Blueprint $table) {
        $table->unsignedBigInteger('id_etudiant');
        $table->unsignedBigInteger('id_semestre');
        $table->foreign('id_etudiant')->references('id_etudiant')->on('etudiant')->onUpdate('cascade')->onDelete('cascade') ;
        $table->foreign('id_semestre')->references('id_semestre')->on('semestre')->onUpdate('cascade')->onDelete('cascade') ;
        $table->primary(['id_etudiant' ,'id_semestre']) ;
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
        Schema::dropIfExists('etudiant');
    }
}
