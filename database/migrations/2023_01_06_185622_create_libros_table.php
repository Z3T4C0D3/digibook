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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("codigo");
            $table->string("anio_publicacion");
            $table->string("descripcion");
            //FK
            $table->unsignedBigInteger('categorias_id');
            $table->unsignedBigInteger('editoriales_id');
            //RESTRICCION DE FK
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('editoriales_id')->references('id')->on('editoriales')->onDelete('cascade');
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
        Schema::dropIfExists('libros');
    }
};
