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
        Schema::create('libros_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libros_id');
            $table->unsignedBigInteger('categorias_id');

            $table->foreign('libros_id')->references('id')->on('libros')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categorias_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('libros_categorias');
    }
};
