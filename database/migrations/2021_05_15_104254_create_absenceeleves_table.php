<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenceelevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenceeleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nb_abs');
            $table->integer('nbj_abs');
            $table->string('type_abs');
            $table->string('niveau'); 
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
        Schema::dropIfExists('absenceeleves');
    }
}
