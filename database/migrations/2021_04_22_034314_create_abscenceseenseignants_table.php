<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbscenceseenseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abscenceseenseignants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('abscence_date');
            $table->Integer('nombre_jours');
            $table->Integer('nombre_heures');
            $table->String('cause_abscences');
            $table->bigInteger('enseigant_id')->unsigned();
    

      
            $table->foreign('enseigant_id')->references('id')->on('enseignants');
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
        Schema::dropIfExists('abscenceseenseignants');
    }
}
