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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',25);
            $table->integer('edad')->nullable();
            $table->string('sexo',25);
            // $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('raza_id');

            // $table->foreign('especie_id')->references('id')->on('especie');
            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('raza_id')->references('id')->on('raza');
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
        Schema::dropIfExists('mascota');
    }
};
