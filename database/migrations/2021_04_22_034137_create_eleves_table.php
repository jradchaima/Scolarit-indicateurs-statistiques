<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_fr');
            $table->string('name_ar');
            $table->string('email');
        
         
            $table->string('sexe');
            $table->date('naissance_date');
            $table->string('naissance_lieu');
            $table->string('adresse');
            $table->integer('nbr_fréres');
            $table->string('nationalité');
            $table->date('entré_date');
            $table->string('nom_pére');
            $table->string('codepost_pére');
            $table->string('tél_pére');
            $table->string('nom_mére');
            $table->string('codepost_mére');
            $table->string('tél_mére');
                  
            $table->bigInteger('etabliss_id')->unsigned();
    
            $table->bigInteger('restaurant_id')->unsigned();
            $table->bigInteger('foyer_id')->unsigned();
            $table->bigInteger('gouv_id')->unsigned();
            $table->bigInteger('dossmed_id')->unsigned();
      
          
            $table->foreign('etabliss_id')->references('id')->on('etablissements');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('foyer_id')->references('id')->on('foyers');
            $table->foreign('gouv_id')->references('id')->on('gouvernerats');
            $table->foreign('dossmed_id')->references('id')->on('dossiers_médicales');
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
        Schema::dropIfExists('eleves');
    }
}
