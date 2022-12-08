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
        Schema::create('coor_servs', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->bigInteger('serv_id')->unsigned();
            $table->bigInteger('empl_id')->unsigned();
            $table->string('turn');
            $table->integer('val_asig');
            $table->timestamps();
           $table->foreign('serv_id')->references('id')->on('servis')->onDelete('cascade');
            $table->foreign('empl_id')->references('id')->on('empls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coor_servs');
    }
};
