<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenceensegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absenceensegs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nb_abs');
            $table->integer('nbj_abs');
            $table->string('type_abs');
            $table->integer('id_etabl');
            $table->integer('id_region');
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
        Schema::dropIfExists('absenceensegs');
    }
}
