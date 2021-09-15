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
            $table->string('chapa_id',10);          
            $table->dateTime('horaEnt')->nullable();
            $table->dateTime('horaSal')->nullable();
            $table->integer('tiempoEst')->default(0);
            $table->double('montoPagar')->default(0);
            $table->timestamps();
           $table->foreign('chapa_id')->references('chapa')->on('vehiculos');
            
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
