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
        Schema::create('alquilers', function (Blueprint $table) {
            $table->id();
            $table->float('monto');
            $table->string('fecha');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('tipo_alquilers_id');
            $table->integer('estado')->default(1);
            $table->foreign('tipo_alquilers_id')->references('id')->on('tipo_alquilers');
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
        Schema::dropIfExists('alquilers');
    }
};
