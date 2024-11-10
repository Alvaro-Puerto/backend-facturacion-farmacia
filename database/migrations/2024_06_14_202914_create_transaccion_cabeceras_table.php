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
        Schema::create('transaccion_cabeceras', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('fecha');
            $table->string('numero');      
            $table->string('observacion');
            $table->float('total')->nullable();
            $table->float('descuento')->nullable();
            $table->float('subtotal')->nullable();
            $table->float('iva')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            $table->string('ref4')->nullable();
            $table->string('estado');
            $table->foreignId('bodega_id');

            $table->foreign('bodega_id')->references('id')->on('bodegas');  
            $table->foreignId('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccion_cabeceras');
    }
};
