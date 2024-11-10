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
        Schema::create('venta_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->foreignId('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');    
            $table->foreignId('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->foreignId('bodega_id');
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->float('total')->nullable();
            $table->float('descuento')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('iva')->nullable();
            $table->boolean('estado');
            $table->string('observacion')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            $table->string('ref4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_cabeceras');
    }
};
