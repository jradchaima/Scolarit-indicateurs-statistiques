<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('violence_date');
            $table->Integer('cause_violence');
            $table->String('type_violence');
            $table->Time('violence_heure');
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
        Schema::dropIfExists('violences');
    }
}
