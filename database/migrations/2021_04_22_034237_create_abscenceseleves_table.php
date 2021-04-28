<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbscenceselevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abscenceseleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('abscence_date');
            $table->Integer('nombre_jours');
            $table->Integer('nombre_heures');
            $table->String('cause_abscences');
            $table->bigInteger('eleve_id')->unsigned();
    

      
            $table->foreign('eleve_id')->references('id')->on('eleves');
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
        Schema::dropIfExists('abscenceseleves');
    }
}
