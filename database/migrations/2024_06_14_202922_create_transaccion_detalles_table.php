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
        Schema::create('transaccion_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaccion_cabecera_id');
            $table->foreign('transaccion_cabecera_id')->references('id')->on('transaccion_cabeceras');
            $table->foreignId('usuario_id');
            $table->foreignId('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->float('cantidad')->nullable();
            $table->float('precio_entrada')->nullable();
            $table->float('precio_salida')->nullable();
            $table->float('descuento_entrada')->nullable();
            $table->float('descuento_salida')->nullable();
            $table->float('subtotal_entrada')->nullable();
            $table->float('subtotal_salida')->nullable();
            $table->float('iva_entrada')->nullable();
            $table->float('iva_salida')->nullable();
            $table->float('total_entrada')->nullable();
            $table->float('total_salida')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccion_detalles');
    }
};
