<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiermedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiermedicals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_etudient');
            $table->string('prenom_etudient');
            $table->boolean('handicape');
            $table->boolean('maladie_chronique');
            $table->boolean('autre_maladie');
            $table->integer('id_etabl');
            $table->integer('id_region');
            $table->integer('id_centrale');
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
        Schema::dropIfExists('dossiermedicals');
    }
}
