<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('copias', function (Blueprint $table) {
            $table->id('n_copia');
            $table->string('estado',25);
            $table->string('formato',10);
            $table->float('precio_alquiler'); 
            $table->unsignedBigInteger('id_pelicula');
            $table->foreign('id_pelicula')->references('id_pelicula')->on('peliculas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copias');
    }
};
