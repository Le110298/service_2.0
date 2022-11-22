<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servis', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->string('Nombre_Servicio');
            $table->bigInteger('empresID')->unsigned();
            $table->date('Fecha');
            $table->time('Hora');
            $table->longText('Ubicacion');
            $table->string('Encargado');
            $table->Integer('Cantida_Meseros');
            $table->bigInteger('Precio');
            $table->longText('Observaciones')->nullable();
            $table->timestamps();
            $table->foreign('empresID')->references('id')->on('empres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servis');
    }
};
