<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroVehsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_vehs', function (Blueprint $table) {
            $table->id();
            $table->string('chapa_id');
            $table->foreign('chapa_id')->references('chapa')->on('vehiculos');
            $table->time('horaEnt');
            $table->time('horaSal');
            $table->integer('tiempoEst');
            $table->double('montoPagar');
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
        Schema::dropIfExists('registro_vehs');
    }
}
