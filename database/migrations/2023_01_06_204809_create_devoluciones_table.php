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
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->id();
            //id del prestamo
            $table->unsignedBigInteger('prestamos_id');
            $table->foreign('prestamos_id')->references('id')->on('prestamos')->onDelete('cascade')->onUpdate('cascade');
            //comentarios
            $table->string('observaciones',100);
            //fecha de devoucion
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
        Schema::dropIfExists('devoluciones');
    }
};
