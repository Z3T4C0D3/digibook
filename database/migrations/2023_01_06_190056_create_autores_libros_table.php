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
        Schema::create('autores_libros', function (Blueprint $table) {
            $table->id();
            //FK
            $table->unsignedBigInteger('id_libro');
            $table->unsignedBigInteger('id_autor');
            //RESTRICCION DE FK
            $table->foreign('id_autor')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('id_libro')->references('id')->on('libros')->onDelete('cascade');
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
        Schema::dropIfExists('autores_libros');
    }
};
