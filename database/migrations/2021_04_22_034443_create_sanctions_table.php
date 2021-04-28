<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('sanction_date');
            $table->Integer('nombre_jours');
            $table->String('cause_sanction');
            $table->String('type_sanction');
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
        Schema::dropIfExists('sanctions');
    }
}
