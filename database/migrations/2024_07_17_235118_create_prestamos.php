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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id('id_prestamo');
            $table->dateTime('fecha_prestamo');
            $table->dateTime('fecha_tope');
            $table->dateTime('fecha_entrega'); 
            $table->unsignedBigInteger('cod_cliente');
            $table->foreign('cod_cliente')->references('cod_cliente')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('n_copia');
            $table->foreign('n_copia')->references('n_copia')->on('copias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
