<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('appartement_id')->index();
            $table->string('nom_prenoms');
            $table->string('email');
            $table->string('genre');
            $table->string('phone');
            $table->date('date_naissance');
            $table->integer('nbre_personnes');
            $table->timestamps();
            
            $table->foreign('appartement_id')->references('id')->on('appartements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
