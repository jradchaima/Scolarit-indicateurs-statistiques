<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommondationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommondations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recom');
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
        Schema::dropIfExists('recommondations');
    }
}
