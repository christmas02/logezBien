<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('commune_id');
            $table->unsignedInteger('user_id');
            $table->string('designation');
            $table->string('libelle');

            $table->string('ref');
            $table->integer('superficie');
            $table->integer('salon');
            $table->integer('chambre');
            $table->integer('salle_eau');
            $table->integer('type');
            $table->integer('montant_journalier');
            $table->longText('description')->nullable();
            $table->string('linkvideo')->nullable();
            $table->string('visite3d')->nullable();
            $table->date('pdate_debut')->nullable();
            $table->date('pdate_fin')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('appartements');
    }
}
