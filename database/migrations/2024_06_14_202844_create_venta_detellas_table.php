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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_cabecera_id');
            $table->foreign('venta_cabecera_id')->references('id')->on('venta_cabeceras');
            $table->foreignId('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->float('cantidad');
            $table->float('precio');
            $table->float('descuento');
            $table->float('subtotal');
            $table->float('iva');
            $table->float('total');
            $table->string('observacion')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            $table->string('ref4')->nullable();
            $table->boolean('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detellas');
    }
};
