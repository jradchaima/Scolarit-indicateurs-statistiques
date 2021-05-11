<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('representant');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->boolean('region')->default(0);
            $table->boolean('etablissement')->default(0);
            $table->bigInteger('etabliss_id')->unsigned();
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('centre_id')->unsigned();
            $table->foreign('etabliss_id')->references('id')->on('etablissements');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('centre_id')->references('id')->on('centres');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
